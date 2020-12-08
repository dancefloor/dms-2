<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                
        Permission::firstOrCreate([
            'name'  => 'CRUD Courses',
            'slug'  => 'crud_courses',
            'label' => 'The person has the right to view, create, edit and delete courses', 
        ]);

        Permission::firstOrCreate([
            'name'  => 'CRUD Users',
            'slug'  => 'crud_users',
            'label' => 'The person has the right to view, create, edit and delete users', 
        ]);
        
        Permission::firstOrCreate([
            'name'  => 'CRUD Roles',
            'slug'  => 'crud_roles',
            'label' => 'The person has the right to view, create, edit and delete roles', 
        ]);

        Permission::firstOrCreate([
            'name'  => 'CRUD Permissions',
            'slug'  => 'crud_permissions',
            'label' => 'The person has the right to view, create, edit and delete permissions', 
        ]);

        Permission::firstOrCreate([
            'name'  => 'CRUD Styles',
            'slug'  => 'crud_styles',
            'label' => 'The person has the right to view, create, edit and delete styles', 
        ]);

        Permission::firstOrCreate([
            'name'  => 'CRUD Locations',
            'slug'  => 'crud_locations',
            'label' => 'The person has the right to view, create, edit and delete locations', 
        ]);

        Permission::firstOrCreate([
            'name'  => 'CRUD Classrooms',
            'slug'  => 'crud_classrooms',
            'label' => 'The person has the right to view, create, edit and delete classrooms', 
        ]);

        Permission::firstOrCreate([
            'name'  => 'CRUD Payments',
            'slug'  => 'crud_payments',
            'label' => 'The person has the right to view, create, edit and delete payments', 
        ]);

        Permission::firstOrCreate([
            'name'  => 'CRUD Orders',
            'slug'  => 'crud_orders',
            'label' => 'The person has the right to view, create, edit and delete orders', 
        ]);

        // List of Roles -------------------
        // Courses 1 | Users 2 | Roles 3 | Permissions 4 | Styles 5 | Locations 6 | Classrooms 7 | Payments 8 | Orders 9

        $super = Role::firstOrCreate([
            'name'  => 'Super Admin',
            'slug'  => 'super-admin',
            'label' => 'Administrator of the website, full access, all rigths granted',
        ]);
        
        $super->permissions()->attach([1,2,3,4,5,6,7,8,9]);

        $admin = Role::firstOrCreate([
            'name'  => 'Admin',
            'slug'  => 'admin',
            'label' => 'The school owner',
        ]);
        $admin->permissions()->attach([1,2,3,5,6,7,8,9]);

        $manager = Role::firstOrCreate([
            'name'  => 'Manager',
            'slug'  => 'manager',
            'label' => 'School manager',
        ]);
        $manager->permissions()->attach([1,2,5,6,7,8,9]);

        $secretary = Role::firstOrCreate([
            'name'  => 'Secretary',
            'slug'  => 'secretary',
            'label' => 'In charge of controlling registrations, courses as well as answering phone calls and emails',
        ]);
        $secretary->permissions()->attach([1,2,5,6,7,8,9]);

        $editor = Role::firstOrCreate([
            'name'  => 'Editor',
            'slug'  => 'editor',
            'label' => 'A person who helps the manager with payments and the administration',
        ]);
        $editor->permissions()->attach([1,2,5,6,7]);

        $instructor = Role::firstOrCreate([
            'name'  => 'Instructor',
            'slug'  => 'instructor',
            'label' => 'A person who teaches and manages dance classes',
        ]);
        $instructor->permissions()->attach([1,5,6,7,8]);

        $assistant = Role::firstOrCreate([
            'name'  => 'Class Assistant',
            'slug'  => 'class-assistant',
            'label' => 'An advanced student that helps with the classes but is does not belongs to the dancefloor team',
        ]);                 
        
        Role::firstOrCreate([
            'name'  => 'Student',
            'slug'  => 'student',
            'label' => 'Default type of user',
        ]);
    }

}

