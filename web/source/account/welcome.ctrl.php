<?php
defined('IN_IA') or exit('Access Denied');
if (!empty($_W['uid'])) {
	header('Location: '.url('account/display'));
	exit;
}
$settings = $_W['setting'];
$copyright = $settings['copyright'];
$copyright['slides'] = iunserializer($copyright['slides']);
$mbcopyright = $settings['mbcopyright'];
$mbcopyright['slides'] = iunserializer($mbcopyright['slides']);
if (isset($copyright['showhomepage']) && empty($copyright['showhomepage'])) {
	header("Location: ".url('user/login'));
	exit;
}
load()->model('article');
$notices = article_notice_home();
$news = article_news_home();
$case = article_case_home();
$case2 = article_case2_home();
$case3 = article_case3_home();
$links = article_link_home();
$product = article_product_home();
template('account/welcome');