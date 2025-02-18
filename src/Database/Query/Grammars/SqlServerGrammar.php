<?php namespace Laralips\Storm\Database\Query\Grammars;

use Illuminate\Database\Query\Grammars\SqlServerGrammar as BaseSqlServerGrammar;
use Laralips\Storm\Database\Query\Grammars\Concerns\SelectConcatenations;

class SqlServerGrammar extends BaseSqlServerGrammar
{
    use SelectConcatenations;
}
