<?php

namespace App\Models;

use App\Traits\PermissionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory ;
    // PermissionTrait;

    protected $fillable = [
        'name',
    ];



    public static function createWithAbilities(Request $request)
    {
        DB::beginTransaction();
        try {
            $role = Role::create([
                'name' => $request->input('name'),
            ]);
            foreach ($request->input('abilities') as $ability_code => $value) {
                RoleAbility::create([
                    'role_id' => $role->id,
                    'ability' => $ability_code,
                    'type' => $value,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        
        return $role;
    }

    public function updateWithAbilities(Request $request)
    {
        DB::beginTransaction();
        try{
            $this->update([
                'name' => $request->input('name'),
            ]);
            // dd($this->id);
            foreach ($request->input('abilities') as $ability_code => $value) {
                RoleAbility::updateOrCreate([
                    'role_id' => $this->id,
                    'ability' => $ability_code,
                ], [
                    'type' => $value,
                ]);
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;

        }
       
        return $this;
    }


    public function roleAbilities()
    {
        return $this->hasMany(RoleAbility::class);
    }
   
}
