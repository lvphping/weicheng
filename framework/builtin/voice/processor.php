<?php

defined('IN_IA') or exit('Access Denied');

class VoiceModuleProcessor extends WeModuleProcessor {
	public function respond() {
		global $_W;
		$rid = $this->rule;
		$sql = "SELECT `mediaid` FROM " . tablename('voice_reply') . " WHERE `rid`=:rid";
		$mediaid = pdo_fetchcolumn($sql, array(':rid' => $rid));
		if (empty($mediaid)) {
			return false;
		}
		return $this->respVoice($mediaid);
	}
}
