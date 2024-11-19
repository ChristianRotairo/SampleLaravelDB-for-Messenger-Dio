<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEntryModel extends Model
{
    use HasFactory;

    protected $table = "data_entry";
    protected $fillable =[
        'firstName',
        'lastName',
        'kvnr',
        'birthDay',
        'gender',
        'placeOfBirth',
        'maritalStatus',
        'birthState',
        'religion',
        'motherMaidenName',
        'children',
        'motherDeceasedDate',
        'motherCausedOfDeath',
        'fatherName',
        'fatherDeceasedDate',
        'fatherCausedOfDeath',
        'spouseName',
        'spouseDeceasedDate',
        'spouseCausedOfDeath',
        'preferredLanguage',
        'contactPreference',
        'emailAddress',
        'emergencyContactName',
        'relationship',
        'phoneNumber',
        'emergencyContactEmailAddress',
    ];
}
