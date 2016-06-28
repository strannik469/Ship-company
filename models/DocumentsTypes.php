<?php

namespace app\models;

use yii\db\ActiveRecord;

class DocumentsTypes extends ActiveRecord
{
	public static function tableName()
	{
		return 'tblDocumentsTypes';
	}
	public function rules()
	{
		return [
		    ['type', 'required'],
		];
	}
}
