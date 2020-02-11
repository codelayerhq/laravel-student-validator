<?php

namespace Codelayer\StudentValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

class StudentEmail implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return app('student-validator')->isValidEmail($value);
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return __('student-validator::messages.student_email');
    }
}
