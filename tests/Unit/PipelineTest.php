<?php

namespace Tests\Unit;

use Illuminate\Container\Container;
use PHPUnit\Framework\TestCase;
use App\Pipelines\SanitizeTextPipeline as SUT;

class PipelineTest extends TestCase
{
    private SUT $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new SUT(new Container());
    }

    public function testItRemovesHtmlTags()
    {
        $potentialDangerousText = 'This is NOT an attempt of hacking <script type="text/javascript">document.write("Gotcha");</script>';

        $result = $this->sut->pipe($potentialDangerousText);

        $this->assertStringNotContainsString('<script type"text/javascript">', $result);
    }
}
