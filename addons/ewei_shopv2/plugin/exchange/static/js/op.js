define(['core', 'tpl'], function (core, tpl) {
    var modal = {};
        modal.init = function(){
            $('.order-verify').unbind('click').click(function () {
                var ajaxurl = $(this).attr('value');
                var goods = $(this).attr('data');
                var c = '#option'+goods;
                ajaxurl = ajaxurl+'&yx='+$(c).val();
                modal.verify(ajaxurl,goods)
            });

            $('.x').unbind('click').click(function () {
                if($(this).attr('type') == 'default'){
                    $(this).removeClass('btn-default').addClass('btn-danger');
                    $(this).attr('type','danger');
                    $(this).html("<i class='icon icon-selected'></i> 已选择");
                    var e = "#goods"+$(this).attr('data');
                    $(e).val($(this).attr('data'));
                    var total = $("input[name='total']").val();
                    var new_total = Number(total) + Number("1");
                    $("input[name='total']").val(new_total);
                    $('.total').html(new_total);
                    goodsArr.push([$(this).attr('data'),$(this).attr('value')]);
                    modal.caculate(goodsArr,optionsss);
                }else {
                    $(this).removeClass('btn-danger').addClass('btn-default');
                    $(this).attr('type','default');
                    $(this).html("选择");
                    var e = "#goods"+$(this).attr('data');
                    $(e).val('');
                    var total = $("input[name='total']").val();
                    var new_total = Number(total) - Number("1");
                    $("input[name='total']").val(new_total);
                    $('.total').html(new_total);
                    var i;
                    for(i=0;i<goodsArr.length;i++){
                        if (goodsArr[i][0] == $(this).attr('data')){
                            goodsArr.splice(i,1);
                            break;
                        }else{
                            continue;
                        }
                    }
                    modal.caculate(goodsArr,optionsss);
                }
            });
        }
        modal.verify = function (ajaxurl,goods) {
            htmlobj=$.ajax({url:ajaxurl,async:false});
            container = new FoxUIModal({
                content: htmlobj.responseText,
                extraClass: "popup-modal",
            });
            container.show('slow');
            $('.closebtn').unbind('click').click(function () {
                container.close();
            });
            $('.cartbtn').unbind('click').click(function () {
                container.close();
            });
            $('.xuanhaole').unbind('click').click(function () {
                var data = $("input[name='data']").val();
                var e = "#option"+goods;
                var option = $(e).val();
                $(e).val(data);
                var c = "a[data='"+goods+"']";
                if($("input[name='count']").val()>0){
                    $(c).html("<i class='icon icon-selected'></i> 已选择");
                    $(c).removeClass('btn-default').addClass('btn-danger');
                }else{
                    $(c).html(" 选择");
                    $(c).removeClass('btn-danger').addClass('btn-default');
                }
                var count = $("input[name='count']").val();
                var old_count = $("input[name='old_count']").val();
                var count_change = Number(count) - Number(old_count);
                var total = $("input[name='total']").val();
                var new_total = Number(total) + Number(count_change);
                $("input[name='total']").val(new_total);
                $('.total').html(new_total);
                optionsss = optionArr;
                modal.caculate(goodsArr,optionsss);
                container.close();
            });
    };

    modal.caculate = function(goods,option){
        var arr = goods.concat(option);
        var leng = arr.length;
        arr.sort(function (x,y) {
            return y[1] - x[1];
        });
        if (exchangetype == 1){//按个数
            if(!Number(exchangevalue)==0){
                for(var c = 0;c<Number(exchangevalue);c++){
                    arr.splice(0,1);
                }
                var sum = 0;
                for(var d = 0;d<arr.length;d++){
                    sum = parseFloat(arr[d][1]) + parseFloat(sum);
                }
                sum = parseFloat(sum).toFixed(2);
                $(".value").html(sum);


                var again = Number(exchangevalue)-Number(leng);
                if (Number(again)<0){again = 0;}
                $(".again").html(again);
            }
        }else if(exchangetype == 2) {//按面值
            var sum = 0;
            var cha = 0;//差价
            for(var e = 0;e<arr.length;e++){
                sum = parseFloat(arr[e][1]) + parseFloat(sum);
                if (sum == parseFloat(exchangevalue).toFixed(2)){
                    break;
                }else if(sum > parseFloat(exchangevalue).toFixed(2)){
                    cha = parseFloat(sum) - parseFloat(exchangevalue);
                    break;
                }else{
                    continue;
                }
            }
            var sum2 = 0;
            for(var f = e+1;f<arr.length;f++){
                sum2 = parseFloat(arr[f][1]) + parseFloat(sum2);
            }
            var total = parseFloat(sum2) + parseFloat(cha);
            total = total.toFixed(2);
            $(".value").html(total);
        }
    };
    return modal
});