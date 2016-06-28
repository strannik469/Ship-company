<?php

namespace app\models;

use yii\db\ActiveRecord;

class Workers extends ActiveRecord
{
	public static function tableName()
	{
		return 'tblWorkers';
	}
	public function rules()
	{
		return [
		    [['tabelNumber','name','surname','secondName','dateBirthday','idPost','address','telephone','telHome','telWork','firedStatus'], 'required'],
		];
	}
	
	public function getPost()
{
    return $this->hasOne(Posts::className(), ['id' => 'idPost']);
}
 
	public function getPostName()
{
    $post = $this->post;
 
    return $post ? $post->post : '';
}
}
