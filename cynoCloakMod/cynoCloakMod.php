<?php

function getCynoList() {
	$cynoq = new DBQuery();
	$cynosql = "select itd_kll_id from kb3_items_dropped where (itd_itm_id = 21096 or itd_itm_id = 28646) and (itd_itl_id >= 27 and itd_itl_id <=34) union select itd_kll_id from kb3_items_destroyed where (itd_itm_id = 21096 or itd_itm_id = 28646) and (itd_itl_id >= 27 and itd_itl_id <=34)";
	$cynoq->execute($cynosql);
	
	$cynos = array();
	while ($kill = $cynoq->getRow()) {
		$cynos[] = $kill[itd_kll_id];
	}
	return $cynos;
}

function getCloakList() {
	$covertq = new DBQuery();
	$covertsql = "select itd_kll_id from kb3_items_dropped where (itd_itm_id = 11370 or itd_itm_id = 11577 or itd_itm_id = 11578 or itd_itm_id = 14234) and (itd_itl_id >= 27 and itd_itl_id <=34) union select itd_kll_id from kb3_items_destroyed where (itd_itm_id = 11370 or itd_itm_id = 11577 or itd_itm_id = 11578 or itd_itm_id = 14234) and (itd_itl_id >= 27 and itd_itl_id <=34)";
	$covertq->execute($covertsql);
	
	$coverts = array();
	while ($kill = $covertq->getRow()) {
		$coverts[] = $kill[itd_kll_id];
	}
	return $coverts;
}

function getEntosisList() {
	$entosisq = new DBQuery();
	$entosissql = "select itd_kll_id from kb3_items_dropped where (itd_itm_id = 34593 or itd_itm_id = 34595) and (itd_itl_id >= 27 and itd_itl_id <=34) union select itd_kll_id from kb3_items_destroyed where (itd_itm_id = 34593 or itd_itm_id = 34595) and (itd_itl_id >= 27 and itd_itl_id <=34)";
	$entosisq->execute($entosissql);
	
	$entosises = array();
	while ($kill = $entosisq->getRow()) {
		$entosises[] = $kill[itd_kll_id];
	}
	return $entosises;
}

?>