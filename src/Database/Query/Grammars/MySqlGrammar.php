<?php namespace Laralips\Storm\Database\Query\Grammars;

use Illuminate\Database\Query\Grammars\MySqlGrammar as BaseMysqlGrammer;
use Laralips\Storm\Database\Query\Grammars\Concerns\SelectConcatenations;

class MySqlGrammar extends BaseMysqlGrammer
{
    use SelectConcatenations;
}
