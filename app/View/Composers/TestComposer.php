<?php
namespace App\View\Composers;

use Illuminate\View\View;

class TestComposer{
    public function compose(View $view){
        $this->composeShareView($view);
    }
    
    private function composeShareView(View $view){
        $view->with('data', 'something');
    }
}
