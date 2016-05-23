<?php

namespace app\models;

class Posts extends \yii\db\ActiveRecord{
	
	public static function tableName() {
		
		return 'tblPosts';
	}
	
	public static function getAll() {
		
		$data = self::find()->all();
		
		return $data;
	}
	
	public static function getOne($id) {
		
		$data = self::find()->where(['id'=>$id])
		->one();
		
		return $data;
	}
	
}