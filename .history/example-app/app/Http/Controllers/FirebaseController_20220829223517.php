<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    protected $database;

    public function __construct()
    {
        $this->database = app('firebase.database');
    }

    $database->getReference(todos)
  ->set([
       'task' => 'Example Task',
       'is_done' => false
    ]);
$database->getReference(todos/tasks)->set('New Task Name');
To write to a specific child node without overwriting the other nodes, you can use the update() method.

To append data to an existing list, you can use the push() method. The push() method generates a unique key every time a new child is added. The unique key generated is based on a timestamp, which helps to automatically sort the list of items in an ordered manner.

Deleting data

You can delete a reference and all the data it contains.

$database->getReference('tasks')->remove();
You can also use update() method to delete multiple children in a single call.

You can also run database transactions in Realtime Database. You can refer to the documentation for further information on database transactions.

Conclusion

I guess you now have a clear idea about using Firebase Realtime Database in Laravel projects 😃. If you need help, just drop a comment below.

106


2
}
