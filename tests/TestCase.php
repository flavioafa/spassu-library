<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    protected User $user;

    /**
     * @throws \Throwable
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::query()->whereEmail('user@mail.com')->get()->first();
        DB::beginTransaction();
    }

    /**
     * @throws \Throwable
     */
    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }
}
