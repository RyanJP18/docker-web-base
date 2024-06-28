<?php

namespace Tests\Feature;

use App\Models\Target;
use Database\Factories\TargetFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TargetTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the API route works with a given miRNA id
     */
    public function test_search_targets_by_mirna_id()
    {
        $target = TargetFactory::new()->create();
        $target = Target::find($target->id);

        $response = $this->getJson('/api/targets/search_mirna/' . $target->mirna_id);

        $response->assertStatus(200)
            ->assertJsonFragment($target->toArray())
            ->assertJsonCount(1);
    }

    /**
     * Test that searching fails if the miRNA id is incorrect
     */
    public function test_search_targets_by_mirna_id_when_empty()
    {
        $fakeMirnaId = 'non_existent_mirna_id';

        $response = $this->getJson('/api/targets/search_mirna/' . $fakeMirnaId);

        $response->assertStatus(200) 
            ->assertJsonCount(0);
    }

    /**
     * Test the API route works with a given transcript id
     */
    public function test_search_targets_by_transcript_id()
    {
        $target = TargetFactory::new()->create();
        $target = Target::find($target->id);

        $response = $this->getJson('/api/targets/search_transcript/' . $target->ensembl_transcript_id);

        $response->assertStatus(200)
            ->assertJsonFragment($target->toArray())
            ->assertJsonCount(1);
    }

    /**
     * Test that searching fails if the transcript id is incorrect
     */
    public function test_search_targets_by_transcript_id_when_empty()
    {
        $fakeTranscriptId = 'non_existent_transcript_id';

        $response = $this->getJson('/api/targets/search_transcript/' . $fakeTranscriptId);
// dd($response);
        $response->assertStatus(200) 
            ->assertJsonCount(0);
    }

    /**
     * Test the data types are correct and not null
     */
    public function test_targets_data_types_are_correct()
    {
        $target = TargetFactory::new()->create();
        $target = Target::find($target->id);

        $this->assertIsInt($target->id);
        $this->assertIsString($target->mirna_id);
        $this->assertIsString($target->ensembl_transcript_id);
        $this->assertIsFloat($target->score);
        $this->assertIsString($target->seed);
        $this->assertIsInt($target->position);

        $this->assertNotNull($target->id);
        $this->assertNotNull($target->mirna_id);
        $this->assertNotNull($target->ensembl_transcript_id);
        $this->assertNotNull($target->score);
        $this->assertNotNull($target->seed);
        $this->assertNotNull($target->position);
    }
}
