<?php namespace Laralips\Storm\Database\Query\Grammars;

use Illuminate\Database\Query\Grammars\PostgresGrammar as BasePostgresGrammer;
use Laralips\Storm\Database\Query\Grammars\Concerns\SelectConcatenations;

class PostgresGrammar extends BasePostgresGrammer
{
    use SelectConcatenations;
}
