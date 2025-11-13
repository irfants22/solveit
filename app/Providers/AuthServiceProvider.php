<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Question;
use App\Policies\AnswerPolicy;
use App\Policies\QuestionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }


    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Answer::class => AnswerPolicy::class,
        Question::class => QuestionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
