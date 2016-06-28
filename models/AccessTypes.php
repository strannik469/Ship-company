<?php

namespace app\models;

use yii\db\ActiveRecord;

class AccessTypes extends ActiveRecord
{
	public static function tableName()
	{
		return 'tblAccessTypes';
	}
	public function rules()
	{
		return [
		    ['type', 'required'],
		];
	}
}
