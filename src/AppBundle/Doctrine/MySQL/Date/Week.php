<?php

namespace AppBundle\Doctrine\MySQL\Date;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

class Week extends FunctionNode
{
    private $date;

    private $mode = 0;

    public function getSql(SqlWalker $sqlWalker)
    {
        return sprintf('WEEK(%s, %d)', $sqlWalker->walkArithmeticPrimary($this->date), $sqlWalker->walkArithmeticPrimary($this->mode));
    }
    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->date = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->mode = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
