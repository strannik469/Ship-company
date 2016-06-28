<?php

namespace app\models;

use yii\db\ActiveRecord;

class Posts extends ActiveRecord
{
	public static function tableName()
	{
		return 'tblPosts';
	}
	public function rules()
	{
		return [
		    ['post', 'required'],
		];
	}
}
