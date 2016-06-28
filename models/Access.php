<?php

namespace app\models;

use yii\db\ActiveRecord;

class Access extends ActiveRecord
{
	public static function tableName()
	{
		return 'tblAccess';
	}
	public function rules()
	{
		return [
		    [['idType','dateStart','dateEnd','number','idWorkers'], 'required'],
		];
	}
	
	public function getType()
{
    return $this->hasOne(AccessTypes::className(), ['id' => 'idType']);
}
 
	public function getAccessName()
{
    $type = $this->type;
 
    return $type ? $type->type : '';
}

	public function getSurname()
{
    return $this->hasOne(Workers::className(), ['id' => 'idWorkers']);
}
 
	public function getSurnameName()
{
    $surname = $this->surname;
 
    return $surname ? $surname->surname : '';
}

	public function getName()
{
    return $this->hasOne(Workers::className(), ['id' => 'idWorkers']);
}
 
	public function getNameName()
{
    $name = $this->name;
 
    return $name ? $name->name : '';
}

	public function getsecondName()
{
    return $this->hasOne(Workers::className(), ['id' => 'idWorkers']);
}
 
	public function getsecondNameName()
{
    $secondName = $this->secondName;
 
    return $secondName ? $secondName->secondName : '';
}
}
