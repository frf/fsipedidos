<?php


/**
 * Base class that represents a query for the 'sistema' table.
 *
 *
 *
 * @method SistemaQuery orderByCoSistema($order = Criteria::ASC) Order by the co_sistema column
 * @method SistemaQuery orderByNoEmpresa($order = Criteria::ASC) Order by the no_empresa column
 * @method SistemaQuery orderByNoDominio($order = Criteria::ASC) Order by the no_dominio column
 *
 * @method SistemaQuery groupByCoSistema() Group by the co_sistema column
 * @method SistemaQuery groupByNoEmpresa() Group by the no_empresa column
 * @method SistemaQuery groupByNoDominio() Group by the no_dominio column
 *
 * @method SistemaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SistemaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SistemaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SistemaQuery leftJoinColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Colaborador relation
 * @method SistemaQuery rightJoinColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Colaborador relation
 * @method SistemaQuery innerJoinColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Colaborador relation
 *
 * @method Sistema findOne(PropelPDO $con = null) Return the first Sistema matching the query
 * @method Sistema findOneOrCreate(PropelPDO $con = null) Return the first Sistema matching the query, or a new Sistema object populated from the query conditions when no match is found
 *
 * @method Sistema findOneByNoEmpresa(string $no_empresa) Return the first Sistema filtered by the no_empresa column
 * @method Sistema findOneByNoDominio(string $no_dominio) Return the first Sistema filtered by the no_dominio column
 *
 * @method array findByCoSistema(int $co_sistema) Return Sistema objects filtered by the co_sistema column
 * @method array findByNoEmpresa(string $no_empresa) Return Sistema objects filtered by the no_empresa column
 * @method array findByNoDominio(string $no_dominio) Return Sistema objects filtered by the no_dominio column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseSistemaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSistemaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Sistema', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SistemaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SistemaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SistemaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SistemaQuery) {
            return $criteria;
        }
        $query = new SistemaQuery();
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
     * @return   Sistema|Sistema[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SistemaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SistemaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sistema A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCoSistema($key, $con = null)
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
     * @return                 Sistema A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_sistema, no_empresa, no_dominio FROM sistema WHERE co_sistema = :p0';
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
            $obj = new Sistema();
            $obj->hydrate($row);
            SistemaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sistema|Sistema[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sistema[]|mixed the list of results, formatted by the current formatter
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
     * @return SistemaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SistemaPeer::CO_SISTEMA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SistemaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SistemaPeer::CO_SISTEMA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the co_sistema column
     *
     * Example usage:
     * <code>
     * $query->filterByCoSistema(1234); // WHERE co_sistema = 1234
     * $query->filterByCoSistema(array(12, 34)); // WHERE co_sistema IN (12, 34)
     * $query->filterByCoSistema(array('min' => 12)); // WHERE co_sistema >= 12
     * $query->filterByCoSistema(array('max' => 12)); // WHERE co_sistema <= 12
     * </code>
     *
     * @param     mixed $coSistema The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SistemaQuery The current query, for fluid interface
     */
    public function filterByCoSistema($coSistema = null, $comparison = null)
    {
        if (is_array($coSistema)) {
            $useMinMax = false;
            if (isset($coSistema['min'])) {
                $this->addUsingAlias(SistemaPeer::CO_SISTEMA, $coSistema['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coSistema['max'])) {
                $this->addUsingAlias(SistemaPeer::CO_SISTEMA, $coSistema['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SistemaPeer::CO_SISTEMA, $coSistema, $comparison);
    }

    /**
     * Filter the query on the no_empresa column
     *
     * Example usage:
     * <code>
     * $query->filterByNoEmpresa('fooValue');   // WHERE no_empresa = 'fooValue'
     * $query->filterByNoEmpresa('%fooValue%'); // WHERE no_empresa LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noEmpresa The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SistemaQuery The current query, for fluid interface
     */
    public function filterByNoEmpresa($noEmpresa = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noEmpresa)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noEmpresa)) {
                $noEmpresa = str_replace('*', '%', $noEmpresa);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SistemaPeer::NO_EMPRESA, $noEmpresa, $comparison);
    }

    /**
     * Filter the query on the no_dominio column
     *
     * Example usage:
     * <code>
     * $query->filterByNoDominio('fooValue');   // WHERE no_dominio = 'fooValue'
     * $query->filterByNoDominio('%fooValue%'); // WHERE no_dominio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noDominio The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SistemaQuery The current query, for fluid interface
     */
    public function filterByNoDominio($noDominio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noDominio)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noDominio)) {
                $noDominio = str_replace('*', '%', $noDominio);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SistemaPeer::NO_DOMINIO, $noDominio, $comparison);
    }

    /**
     * Filter the query by a related Colaborador object
     *
     * @param   Colaborador|PropelObjectCollection $colaborador  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SistemaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByColaborador($colaborador, $comparison = null)
    {
        if ($colaborador instanceof Colaborador) {
            return $this
                ->addUsingAlias(SistemaPeer::CO_SISTEMA, $colaborador->getCoSistema(), $comparison);
        } elseif ($colaborador instanceof PropelObjectCollection) {
            return $this
                ->useColaboradorQuery()
                ->filterByPrimaryKeys($colaborador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByColaborador() only accepts arguments of type Colaborador or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Colaborador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SistemaQuery The current query, for fluid interface
     */
    public function joinColaborador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Colaborador');

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
            $this->addJoinObject($join, 'Colaborador');
        }

        return $this;
    }

    /**
     * Use the Colaborador relation Colaborador object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ColaboradorQuery A secondary query class using the current class as primary query
     */
    public function useColaboradorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinColaborador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Colaborador', 'ColaboradorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sistema $sistema Object to remove from the list of results
     *
     * @return SistemaQuery The current query, for fluid interface
     */
    public function prune($sistema = null)
    {
        if ($sistema) {
            $this->addUsingAlias(SistemaPeer::CO_SISTEMA, $sistema->getCoSistema(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
