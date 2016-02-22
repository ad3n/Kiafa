<?php

namespace AppBundle\Doctrine\MySQL\Date;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

class Year extends FunctionNode
{
    private $date;

    public function getSql(SqlWalker $sqlWalker)
    {
        return 'YEAR('.$sqlWalker->walkArithmeticPrimary($this->date).')';
    }
    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->date = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
