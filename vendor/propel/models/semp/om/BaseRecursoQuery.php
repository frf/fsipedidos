<?php


/**
 * Base class that represents a query for the 'recurso' table.
 *
 *
 *
 * @method RecursoQuery orderByCoRecurso($order = Criteria::ASC) Order by the co_recurso column
 * @method RecursoQuery orderByNoRecurso($order = Criteria::ASC) Order by the no_recurso column
 * @method RecursoQuery orderByDsRecurso($order = Criteria::ASC) Order by the ds_recurso column
 * @method RecursoQuery orderByTpRecurso($order = Criteria::ASC) Order by the tp_recurso column
 * @method RecursoQuery orderByDtCadastro($order = Criteria::ASC) Order by the dt_cadastro column
 * @method RecursoQuery orderByCoUsuarioCadastro($order = Criteria::ASC) Order by the co_usuario_cadastro column
 * @method RecursoQuery orderByDtAlteracao($order = Criteria::ASC) Order by the dt_alteracao column
 * @method RecursoQuery orderByCoUsuarioAlteracao($order = Criteria::ASC) Order by the co_usuario_alteracao column
 *
 * @method RecursoQuery groupByCoRecurso() Group by the co_recurso column
 * @method RecursoQuery groupByNoRecurso() Group by the no_recurso column
 * @method RecursoQuery groupByDsRecurso() Group by the ds_recurso column
 * @method RecursoQuery groupByTpRecurso() Group by the tp_recurso column
 * @method RecursoQuery groupByDtCadastro() Group by the dt_cadastro column
 * @method RecursoQuery groupByCoUsuarioCadastro() Group by the co_usuario_cadastro column
 * @method RecursoQuery groupByDtAlteracao() Group by the dt_alteracao column
 * @method RecursoQuery groupByCoUsuarioAlteracao() Group by the co_usuario_alteracao column
 *
 * @method RecursoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RecursoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RecursoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RecursoQuery leftJoinPermissao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Permissao relation
 * @method RecursoQuery rightJoinPermissao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Permissao relation
 * @method RecursoQuery innerJoinPermissao($relationAlias = null) Adds a INNER JOIN clause to the query using the Permissao relation
 *
 * @method Recurso findOne(PropelPDO $con = null) Return the first Recurso matching the query
 * @method Recurso findOneOrCreate(PropelPDO $con = null) Return the first Recurso matching the query, or a new Recurso object populated from the query conditions when no match is found
 *
 * @method Recurso findOneByNoRecurso(string $no_recurso) Return the first Recurso filtered by the no_recurso column
 * @method Recurso findOneByDsRecurso(string $ds_recurso) Return the first Recurso filtered by the ds_recurso column
 * @method Recurso findOneByTpRecurso(int $tp_recurso) Return the first Recurso filtered by the tp_recurso column
 * @method Recurso findOneByDtCadastro(string $dt_cadastro) Return the first Recurso filtered by the dt_cadastro column
 * @method Recurso findOneByCoUsuarioCadastro(int $co_usuario_cadastro) Return the first Recurso filtered by the co_usuario_cadastro column
 * @method Recurso findOneByDtAlteracao(string $dt_alteracao) Return the first Recurso filtered by the dt_alteracao column
 * @method Recurso findOneByCoUsuarioAlteracao(int $co_usuario_alteracao) Return the first Recurso filtered by the co_usuario_alteracao column
 *
 * @method array findByCoRecurso(int $co_recurso) Return Recurso objects filtered by the co_recurso column
 * @method array findByNoRecurso(string $no_recurso) Return Recurso objects filtered by the no_recurso column
 * @method array findByDsRecurso(string $ds_recurso) Return Recurso objects filtered by the ds_recurso column
 * @method array findByTpRecurso(int $tp_recurso) Return Recurso objects filtered by the tp_recurso column
 * @method array findByDtCadastro(string $dt_cadastro) Return Recurso objects filtered by the dt_cadastro column
 * @method array findByCoUsuarioCadastro(int $co_usuario_cadastro) Return Recurso objects filtered by the co_usuario_cadastro column
 * @method array findByDtAlteracao(string $dt_alteracao) Return Recurso objects filtered by the dt_alteracao column
 * @method array findByCoUsuarioAlteracao(int $co_usuario_alteracao) Return Recurso objects filtered by the co_usuario_alteracao column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseRecursoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRecursoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Recurso', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RecursoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RecursoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RecursoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RecursoQuery) {
            return $criteria;
        }
        $query = new RecursoQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Recurso|Recurso[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RecursoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RecursoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Recurso A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCoRecurso($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Recurso A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_recurso, no_recurso, ds_recurso, tp_recurso, dt_cadastro, co_usuario_cadastro, dt_alteracao, co_usuario_alteracao FROM recurso WHERE co_recurso = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Recurso();
            $obj->hydrate($row);
            RecursoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Recurso|Recurso[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Recurso[]|mixed the list of results, formatted by the current formatter
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
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RecursoPeer::CO_RECURSO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RecursoPeer::CO_RECURSO, $keys, Criteria::IN);
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
     * @param     mixed $coRecurso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByCoRecurso($coRecurso = null, $comparison = null)
    {
        if (is_array($coRecurso)) {
            $useMinMax = false;
            if (isset($coRecurso['min'])) {
                $this->addUsingAlias(RecursoPeer::CO_RECURSO, $coRecurso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coRecurso['max'])) {
                $this->addUsingAlias(RecursoPeer::CO_RECURSO, $coRecurso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecursoPeer::CO_RECURSO, $coRecurso, $comparison);
    }

    /**
     * Filter the query on the no_recurso column
     *
     * Example usage:
     * <code>
     * $query->filterByNoRecurso('fooValue');   // WHERE no_recurso = 'fooValue'
     * $query->filterByNoRecurso('%fooValue%'); // WHERE no_recurso LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noRecurso The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByNoRecurso($noRecurso = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noRecurso)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noRecurso)) {
                $noRecurso = str_replace('*', '%', $noRecurso);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RecursoPeer::NO_RECURSO, $noRecurso, $comparison);
    }

    /**
     * Filter the query on the ds_recurso column
     *
     * Example usage:
     * <code>
     * $query->filterByDsRecurso('fooValue');   // WHERE ds_recurso = 'fooValue'
     * $query->filterByDsRecurso('%fooValue%'); // WHERE ds_recurso LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsRecurso The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByDsRecurso($dsRecurso = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsRecurso)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsRecurso)) {
                $dsRecurso = str_replace('*', '%', $dsRecurso);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RecursoPeer::DS_RECURSO, $dsRecurso, $comparison);
    }

    /**
     * Filter the query on the tp_recurso column
     *
     * Example usage:
     * <code>
     * $query->filterByTpRecurso(1234); // WHERE tp_recurso = 1234
     * $query->filterByTpRecurso(array(12, 34)); // WHERE tp_recurso IN (12, 34)
     * $query->filterByTpRecurso(array('min' => 12)); // WHERE tp_recurso >= 12
     * $query->filterByTpRecurso(array('max' => 12)); // WHERE tp_recurso <= 12
     * </code>
     *
     * @param     mixed $tpRecurso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByTpRecurso($tpRecurso = null, $comparison = null)
    {
        if (is_array($tpRecurso)) {
            $useMinMax = false;
            if (isset($tpRecurso['min'])) {
                $this->addUsingAlias(RecursoPeer::TP_RECURSO, $tpRecurso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tpRecurso['max'])) {
                $this->addUsingAlias(RecursoPeer::TP_RECURSO, $tpRecurso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecursoPeer::TP_RECURSO, $tpRecurso, $comparison);
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
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByDtCadastro($dtCadastro = null, $comparison = null)
    {
        if (is_array($dtCadastro)) {
            $useMinMax = false;
            if (isset($dtCadastro['min'])) {
                $this->addUsingAlias(RecursoPeer::DT_CADASTRO, $dtCadastro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtCadastro['max'])) {
                $this->addUsingAlias(RecursoPeer::DT_CADASTRO, $dtCadastro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecursoPeer::DT_CADASTRO, $dtCadastro, $comparison);
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
     * @param     mixed $coUsuarioCadastro The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByCoUsuarioCadastro($coUsuarioCadastro = null, $comparison = null)
    {
        if (is_array($coUsuarioCadastro)) {
            $useMinMax = false;
            if (isset($coUsuarioCadastro['min'])) {
                $this->addUsingAlias(RecursoPeer::CO_USUARIO_CADASTRO, $coUsuarioCadastro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coUsuarioCadastro['max'])) {
                $this->addUsingAlias(RecursoPeer::CO_USUARIO_CADASTRO, $coUsuarioCadastro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecursoPeer::CO_USUARIO_CADASTRO, $coUsuarioCadastro, $comparison);
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
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByDtAlteracao($dtAlteracao = null, $comparison = null)
    {
        if (is_array($dtAlteracao)) {
            $useMinMax = false;
            if (isset($dtAlteracao['min'])) {
                $this->addUsingAlias(RecursoPeer::DT_ALTERACAO, $dtAlteracao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtAlteracao['max'])) {
                $this->addUsingAlias(RecursoPeer::DT_ALTERACAO, $dtAlteracao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecursoPeer::DT_ALTERACAO, $dtAlteracao, $comparison);
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
     * @param     mixed $coUsuarioAlteracao The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RecursoQuery The current query, for fluid interface
     */
    public function filterByCoUsuarioAlteracao($coUsuarioAlteracao = null, $comparison = null)
    {
        if (is_array($coUsuarioAlteracao)) {
            $useMinMax = false;
            if (isset($coUsuarioAlteracao['min'])) {
                $this->addUsingAlias(RecursoPeer::CO_USUARIO_ALTERACAO, $coUsuarioAlteracao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coUsuarioAlteracao['max'])) {
                $this->addUsingAlias(RecursoPeer::CO_USUARIO_ALTERACAO, $coUsuarioAlteracao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecursoPeer::CO_USUARIO_ALTERACAO, $coUsuarioAlteracao, $comparison);
    }

    /**
     * Filter the query by a related Permissao object
     *
     * @param   Permissao|PropelObjectCollection $permissao  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RecursoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPermissao($permissao, $comparison = null)
    {
        if ($permissao instanceof Permissao) {
            return $this
                ->addUsingAlias(RecursoPeer::CO_RECURSO, $permissao->getCoRecurso(), $comparison);
        } elseif ($permissao instanceof PropelObjectCollection) {
            return $this
                ->usePermissaoQuery()
                ->filterByPrimaryKeys($permissao->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPermissao() only accepts arguments of type Permissao or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Permissao relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RecursoQuery The current query, for fluid interface
     */
    public function joinPermissao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Permissao');

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
            $this->addJoinObject($join, 'Permissao');
        }

        return $this;
    }

    /**
     * Use the Permissao relation Permissao object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PermissaoQuery A secondary query class using the current class as primary query
     */
    public function usePermissaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPermissao($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Permissao', 'PermissaoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Recurso $recurso Object to remove from the list of results
     *
     * @return RecursoQuery The current query, for fluid interface
     */
    public function prune($recurso = null)
    {
        if ($recurso) {
            $this->addUsingAlias(RecursoPeer::CO_RECURSO, $recurso->getCoRecurso(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
