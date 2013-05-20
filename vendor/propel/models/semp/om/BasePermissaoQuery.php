<?php


/**
 * Base class that represents a query for the 'permissao' table.
 *
 *
 *
 * @method PermissaoQuery orderByCoPerfil($order = Criteria::ASC) Order by the co_perfil column
 * @method PermissaoQuery orderByDtAlteracao($order = Criteria::ASC) Order by the dt_alteracao column
 * @method PermissaoQuery orderByCoUsuarioAlteracao($order = Criteria::ASC) Order by the co_usuario_alteracao column
 * @method PermissaoQuery orderByCoRecurso($order = Criteria::ASC) Order by the co_recurso column
 * @method PermissaoQuery orderByStPermissao($order = Criteria::ASC) Order by the st_permissao column
 * @method PermissaoQuery orderByDtCadastro($order = Criteria::ASC) Order by the dt_cadastro column
 * @method PermissaoQuery orderByCoUsuarioCadastro($order = Criteria::ASC) Order by the co_usuario_cadastro column
 *
 * @method PermissaoQuery groupByCoPerfil() Group by the co_perfil column
 * @method PermissaoQuery groupByDtAlteracao() Group by the dt_alteracao column
 * @method PermissaoQuery groupByCoUsuarioAlteracao() Group by the co_usuario_alteracao column
 * @method PermissaoQuery groupByCoRecurso() Group by the co_recurso column
 * @method PermissaoQuery groupByStPermissao() Group by the st_permissao column
 * @method PermissaoQuery groupByDtCadastro() Group by the dt_cadastro column
 * @method PermissaoQuery groupByCoUsuarioCadastro() Group by the co_usuario_cadastro column
 *
 * @method PermissaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PermissaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PermissaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PermissaoQuery leftJoinPerfil($relationAlias = null) Adds a LEFT JOIN clause to the query using the Perfil relation
 * @method PermissaoQuery rightJoinPerfil($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Perfil relation
 * @method PermissaoQuery innerJoinPerfil($relationAlias = null) Adds a INNER JOIN clause to the query using the Perfil relation
 *
 * @method PermissaoQuery leftJoinRecurso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Recurso relation
 * @method PermissaoQuery rightJoinRecurso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Recurso relation
 * @method PermissaoQuery innerJoinRecurso($relationAlias = null) Adds a INNER JOIN clause to the query using the Recurso relation
 *
 * @method PermissaoQuery leftJoinUsuarioRelatedByCoUsuarioAlteracao($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByCoUsuarioAlteracao relation
 * @method PermissaoQuery rightJoinUsuarioRelatedByCoUsuarioAlteracao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByCoUsuarioAlteracao relation
 * @method PermissaoQuery innerJoinUsuarioRelatedByCoUsuarioAlteracao($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByCoUsuarioAlteracao relation
 *
 * @method PermissaoQuery leftJoinUsuarioRelatedByCoUsuarioCadastro($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByCoUsuarioCadastro relation
 * @method PermissaoQuery rightJoinUsuarioRelatedByCoUsuarioCadastro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByCoUsuarioCadastro relation
 * @method PermissaoQuery innerJoinUsuarioRelatedByCoUsuarioCadastro($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByCoUsuarioCadastro relation
 *
 * @method Permissao findOne(PropelPDO $con = null) Return the first Permissao matching the query
 * @method Permissao findOneOrCreate(PropelPDO $con = null) Return the first Permissao matching the query, or a new Permissao object populated from the query conditions when no match is found
 *
 * @method Permissao findOneByCoPerfil(int $co_perfil) Return the first Permissao filtered by the co_perfil column
 * @method Permissao findOneByDtAlteracao(string $dt_alteracao) Return the first Permissao filtered by the dt_alteracao column
 * @method Permissao findOneByCoUsuarioAlteracao(int $co_usuario_alteracao) Return the first Permissao filtered by the co_usuario_alteracao column
 * @method Permissao findOneByCoRecurso(int $co_recurso) Return the first Permissao filtered by the co_recurso column
 * @method Permissao findOneByStPermissao(boolean $st_permissao) Return the first Permissao filtered by the st_permissao column
 * @method Permissao findOneByDtCadastro(string $dt_cadastro) Return the first Permissao filtered by the dt_cadastro column
 * @method Permissao findOneByCoUsuarioCadastro(int $co_usuario_cadastro) Return the first Permissao filtered by the co_usuario_cadastro column
 *
 * @method array findByCoPerfil(int $co_perfil) Return Permissao objects filtered by the co_perfil column
 * @method array findByDtAlteracao(string $dt_alteracao) Return Permissao objects filtered by the dt_alteracao column
 * @method array findByCoUsuarioAlteracao(int $co_usuario_alteracao) Return Permissao objects filtered by the co_usuario_alteracao column
 * @method array findByCoRecurso(int $co_recurso) Return Permissao objects filtered by the co_recurso column
 * @method array findByStPermissao(boolean $st_permissao) Return Permissao objects filtered by the st_permissao column
 * @method array findByDtCadastro(string $dt_cadastro) Return Permissao objects filtered by the dt_cadastro column
 * @method array findByCoUsuarioCadastro(int $co_usuario_cadastro) Return Permissao objects filtered by the co_usuario_cadastro column
 *
 * @package    propel.generator.semp.om
 */
abstract class BasePermissaoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePermissaoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Permissao', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PermissaoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PermissaoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PermissaoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PermissaoQuery) {
            return $criteria;
        }
        $query = new PermissaoQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$co_perfil, $co_recurso]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Permissao|Permissao[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PermissaoPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PermissaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Permissao A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_perfil, dt_alteracao, co_usuario_alteracao, co_recurso, st_permissao, dt_cadastro, co_usuario_cadastro FROM permissao WHERE co_perfil = :p0 AND co_recurso = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Permissao();
            $obj->hydrate($row);
            PermissaoPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Permissao|Permissao[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Permissao[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PermissaoPeer::CO_PERFIL, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PermissaoPeer::CO_RECURSO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PermissaoPeer::CO_PERFIL, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PermissaoPeer::CO_RECURSO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the co_perfil column
     *
     * Example usage:
     * <code>
     * $query->filterByCoPerfil(1234); // WHERE co_perfil = 1234
     * $query->filterByCoPerfil(array(12, 34)); // WHERE co_perfil IN (12, 34)
     * $query->filterByCoPerfil(array('min' => 12)); // WHERE co_perfil >= 12
     * $query->filterByCoPerfil(array('max' => 12)); // WHERE co_perfil <= 12
     * </code>
     *
     * @see       filterByPerfil()
     *
     * @param     mixed $coPerfil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function filterByCoPerfil($coPerfil = null, $comparison = null)
    {
        if (is_array($coPerfil)) {
            $useMinMax = false;
            if (isset($coPerfil['min'])) {
                $this->addUsingAlias(PermissaoPeer::CO_PERFIL, $coPerfil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coPerfil['max'])) {
                $this->addUsingAlias(PermissaoPeer::CO_PERFIL, $coPerfil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermissaoPeer::CO_PERFIL, $coPerfil, $comparison);
    }

    /**
     * Filter the query on the dt_alteracao column
     *
     * Example usage:
     * <code>
     * $query->filterByDtAlteracao('2011-03-14'); // WHERE dt_alteracao = '2011-03-14'
     * $query->filterByDtAlteracao('now'); // WHERE dt_alteracao = '2011-03-14'
     * $query->filterByDtAlteracao(array('max' => 'yesterday')); // WHERE dt_alteracao > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtAlteracao The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function filterByDtAlteracao($dtAlteracao = null, $comparison = null)
    {
        if (is_array($dtAlteracao)) {
            $useMinMax = false;
            if (isset($dtAlteracao['min'])) {
                $this->addUsingAlias(PermissaoPeer::DT_ALTERACAO, $dtAlteracao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtAlteracao['max'])) {
                $this->addUsingAlias(PermissaoPeer::DT_ALTERACAO, $dtAlteracao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermissaoPeer::DT_ALTERACAO, $dtAlteracao, $comparison);
    }

    /**
     * Filter the query on the co_usuario_alteracao column
     *
     * Example usage:
     * <code>
     * $query->filterByCoUsuarioAlteracao(1234); // WHERE co_usuario_alteracao = 1234
     * $query->filterByCoUsuarioAlteracao(array(12, 34)); // WHERE co_usuario_alteracao IN (12, 34)
     * $query->filterByCoUsuarioAlteracao(array('min' => 12)); // WHERE co_usuario_alteracao >= 12
     * $query->filterByCoUsuarioAlteracao(array('max' => 12)); // WHERE co_usuario_alteracao <= 12
     * </code>
     *
     * @see       filterByUsuarioRelatedByCoUsuarioAlteracao()
     *
     * @param     mixed $coUsuarioAlteracao The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function filterByCoUsuarioAlteracao($coUsuarioAlteracao = null, $comparison = null)
    {
        if (is_array($coUsuarioAlteracao)) {
            $useMinMax = false;
            if (isset($coUsuarioAlteracao['min'])) {
                $this->addUsingAlias(PermissaoPeer::CO_USUARIO_ALTERACAO, $coUsuarioAlteracao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coUsuarioAlteracao['max'])) {
                $this->addUsingAlias(PermissaoPeer::CO_USUARIO_ALTERACAO, $coUsuarioAlteracao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermissaoPeer::CO_USUARIO_ALTERACAO, $coUsuarioAlteracao, $comparison);
    }

    /**
     * Filter the query on the co_recurso column
     *
     * Example usage:
     * <code>
     * $query->filterByCoRecurso(1234); // WHERE co_recurso = 1234
     * $query->filterByCoRecurso(array(12, 34)); // WHERE co_recurso IN (12, 34)
     * $query->filterByCoRecurso(array('min' => 12)); // WHERE co_recurso >= 12
     * $query->filterByCoRecurso(array('max' => 12)); // WHERE co_recurso <= 12
     * </code>
     *
     * @see       filterByRecurso()
     *
     * @param     mixed $coRecurso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function filterByCoRecurso($coRecurso = null, $comparison = null)
    {
        if (is_array($coRecurso)) {
            $useMinMax = false;
            if (isset($coRecurso['min'])) {
                $this->addUsingAlias(PermissaoPeer::CO_RECURSO, $coRecurso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coRecurso['max'])) {
                $this->addUsingAlias(PermissaoPeer::CO_RECURSO, $coRecurso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermissaoPeer::CO_RECURSO, $coRecurso, $comparison);
    }

    /**
     * Filter the query on the st_permissao column
     *
     * Example usage:
     * <code>
     * $query->filterByStPermissao(true); // WHERE st_permissao = true
     * $query->filterByStPermissao('yes'); // WHERE st_permissao = true
     * </code>
     *
     * @param     boolean|string $stPermissao The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function filterByStPermissao($stPermissao = null, $comparison = null)
    {
        if (is_string($stPermissao)) {
            $stPermissao = in_array(strtolower($stPermissao), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PermissaoPeer::ST_PERMISSAO, $stPermissao, $comparison);
    }

    /**
     * Filter the query on the dt_cadastro column
     *
     * Example usage:
     * <code>
     * $query->filterByDtCadastro('2011-03-14'); // WHERE dt_cadastro = '2011-03-14'
     * $query->filterByDtCadastro('now'); // WHERE dt_cadastro = '2011-03-14'
     * $query->filterByDtCadastro(array('max' => 'yesterday')); // WHERE dt_cadastro > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtCadastro The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function filterByDtCadastro($dtCadastro = null, $comparison = null)
    {
        if (is_array($dtCadastro)) {
            $useMinMax = false;
            if (isset($dtCadastro['min'])) {
                $this->addUsingAlias(PermissaoPeer::DT_CADASTRO, $dtCadastro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtCadastro['max'])) {
                $this->addUsingAlias(PermissaoPeer::DT_CADASTRO, $dtCadastro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermissaoPeer::DT_CADASTRO, $dtCadastro, $comparison);
    }

    /**
     * Filter the query on the co_usuario_cadastro column
     *
     * Example usage:
     * <code>
     * $query->filterByCoUsuarioCadastro(1234); // WHERE co_usuario_cadastro = 1234
     * $query->filterByCoUsuarioCadastro(array(12, 34)); // WHERE co_usuario_cadastro IN (12, 34)
     * $query->filterByCoUsuarioCadastro(array('min' => 12)); // WHERE co_usuario_cadastro >= 12
     * $query->filterByCoUsuarioCadastro(array('max' => 12)); // WHERE co_usuario_cadastro <= 12
     * </code>
     *
     * @see       filterByUsuarioRelatedByCoUsuarioCadastro()
     *
     * @param     mixed $coUsuarioCadastro The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function filterByCoUsuarioCadastro($coUsuarioCadastro = null, $comparison = null)
    {
        if (is_array($coUsuarioCadastro)) {
            $useMinMax = false;
            if (isset($coUsuarioCadastro['min'])) {
                $this->addUsingAlias(PermissaoPeer::CO_USUARIO_CADASTRO, $coUsuarioCadastro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coUsuarioCadastro['max'])) {
                $this->addUsingAlias(PermissaoPeer::CO_USUARIO_CADASTRO, $coUsuarioCadastro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PermissaoPeer::CO_USUARIO_CADASTRO, $coUsuarioCadastro, $comparison);
    }

    /**
     * Filter the query by a related Perfil object
     *
     * @param   Perfil|PropelObjectCollection $perfil The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PermissaoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPerfil($perfil, $comparison = null)
    {
        if ($perfil instanceof Perfil) {
            return $this
                ->addUsingAlias(PermissaoPeer::CO_PERFIL, $perfil->getCoPerfil(), $comparison);
        } elseif ($perfil instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PermissaoPeer::CO_PERFIL, $perfil->toKeyValue('PrimaryKey', 'CoPerfil'), $comparison);
        } else {
            throw new PropelException('filterByPerfil() only accepts arguments of type Perfil or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Perfil relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function joinPerfil($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Perfil');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Perfil');
        }

        return $this;
    }

    /**
     * Use the Perfil relation Perfil object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PerfilQuery A secondary query class using the current class as primary query
     */
    public function usePerfilQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPerfil($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Perfil', 'PerfilQuery');
    }

    /**
     * Filter the query by a related Recurso object
     *
     * @param   Recurso|PropelObjectCollection $recurso The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PermissaoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRecurso($recurso, $comparison = null)
    {
        if ($recurso instanceof Recurso) {
            return $this
                ->addUsingAlias(PermissaoPeer::CO_RECURSO, $recurso->getCoRecurso(), $comparison);
        } elseif ($recurso instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PermissaoPeer::CO_RECURSO, $recurso->toKeyValue('PrimaryKey', 'CoRecurso'), $comparison);
        } else {
            throw new PropelException('filterByRecurso() only accepts arguments of type Recurso or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Recurso relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function joinRecurso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Recurso');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Recurso');
        }

        return $this;
    }

    /**
     * Use the Recurso relation Recurso object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RecursoQuery A secondary query class using the current class as primary query
     */
    public function useRecursoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRecurso($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Recurso', 'RecursoQuery');
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PermissaoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsuarioRelatedByCoUsuarioAlteracao($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(PermissaoPeer::CO_USUARIO_ALTERACAO, $usuario->getCoUsuario(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PermissaoPeer::CO_USUARIO_ALTERACAO, $usuario->toKeyValue('PrimaryKey', 'CoUsuario'), $comparison);
        } else {
            throw new PropelException('filterByUsuarioRelatedByCoUsuarioAlteracao() only accepts arguments of type Usuario or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsuarioRelatedByCoUsuarioAlteracao relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function joinUsuarioRelatedByCoUsuarioAlteracao($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsuarioRelatedByCoUsuarioAlteracao');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UsuarioRelatedByCoUsuarioAlteracao');
        }

        return $this;
    }

    /**
     * Use the UsuarioRelatedByCoUsuarioAlteracao relation Usuario object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsuarioQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioRelatedByCoUsuarioAlteracaoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsuarioRelatedByCoUsuarioAlteracao($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByCoUsuarioAlteracao', 'UsuarioQuery');
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PermissaoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsuarioRelatedByCoUsuarioCadastro($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(PermissaoPeer::CO_USUARIO_CADASTRO, $usuario->getCoUsuario(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PermissaoPeer::CO_USUARIO_CADASTRO, $usuario->toKeyValue('PrimaryKey', 'CoUsuario'), $comparison);
        } else {
            throw new PropelException('filterByUsuarioRelatedByCoUsuarioCadastro() only accepts arguments of type Usuario or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsuarioRelatedByCoUsuarioCadastro relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function joinUsuarioRelatedByCoUsuarioCadastro($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsuarioRelatedByCoUsuarioCadastro');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UsuarioRelatedByCoUsuarioCadastro');
        }

        return $this;
    }

    /**
     * Use the UsuarioRelatedByCoUsuarioCadastro relation Usuario object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsuarioQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioRelatedByCoUsuarioCadastroQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsuarioRelatedByCoUsuarioCadastro($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByCoUsuarioCadastro', 'UsuarioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Permissao $permissao Object to remove from the list of results
     *
     * @return PermissaoQuery The current query, for fluid interface
     */
    public function prune($permissao = null)
    {
        if ($permissao) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PermissaoPeer::CO_PERFIL), $permissao->getCoPerfil(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PermissaoPeer::CO_RECURSO), $permissao->getCoRecurso(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
