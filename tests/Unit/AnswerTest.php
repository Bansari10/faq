<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Answer;

class AnswerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer = factory(\App\Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);
        $this->assertTrue($answer->save());
    }

    public function testLike()
    {   $answer = Answer::find(random_int(1,50));
        $answer->like = '20';

        $this->assertTrue($answer->save());
    }

    public function testCountLike()
    {   $answer = Answer::find(random_int(1,50));
        $likeCount = count($answer->like);
        $this->assertInternalType("int",$likeCount);
    }

    public function testDisike()
    {   $answer = Answer::find(random_int(1,50));
        $answer->dislike = '15';

        $this->assertTrue($answer->save());
    }

    public function testCountDislike()
    {   $answer = Answer::find(random_int(1,50));
        $dislikeCount = count($answer->dislike);
        $this->assertInternalType("int",$dislikeCount);
    }

}
