<?php


/**
 * Base class that represents a query for the 'empresa' table.
 *
 *
 *
 * @method EmpresaQuery orderByCoEmpresa($order = Criteria::ASC) Order by the co_empresa column
 * @method EmpresaQuery orderByNoEmpresa($order = Criteria::ASC) Order by the no_empresa column
 * @method EmpresaQuery orderByNoDominio($order = Criteria::ASC) Order by the no_dominio column
 *
 * @method EmpresaQuery groupByCoEmpresa() Group by the co_empresa column
 * @method EmpresaQuery groupByNoEmpresa() Group by the no_empresa column
 * @method EmpresaQuery groupByNoDominio() Group by the no_dominio column
 *
 * @method EmpresaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EmpresaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EmpresaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EmpresaQuery leftJoinColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Colaborador relation
 * @method EmpresaQuery rightJoinColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Colaborador relation
 * @method EmpresaQuery innerJoinColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Colaborador relation
 *
 * @method Empresa findOne(PropelPDO $con = null) Return the first Empresa matching the query
 * @method Empresa findOneOrCreate(PropelPDO $con = null) Return the first Empresa matching the query, or a new Empresa object populated from the query conditions when no match is found
 *
 * @method Empresa findOneByNoEmpresa(string $no_empresa) Return the first Empresa filtered by the no_empresa column
 * @method Empresa findOneByNoDominio(string $no_dominio) Return the first Empresa filtered by the no_dominio column
 *
 * @method array findByCoEmpresa(int $co_empresa) Return Empresa objects filtered by the co_empresa column
 * @method array findByNoEmpresa(string $no_empresa) Return Empresa objects filtered by the no_empresa column
 * @method array findByNoDominio(string $no_dominio) Return Empresa objects filtered by the no_dominio column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseEmpresaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEmpresaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Empresa', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EmpresaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EmpresaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EmpresaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EmpresaQuery) {
            return $criteria;
        }
        $query = new EmpresaQuery();
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
     * @return   Empresa|Empresa[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EmpresaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EmpresaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Empresa A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCoEmpresa($key, $con = null)
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
     * @return                 Empresa A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_empresa, no_empresa, no_dominio FROM empresa WHERE co_empresa = :p0';
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
            $obj = new Empresa();
            $obj->hydrate($row);
            EmpresaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Empresa|Empresa[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Empresa[]|mixed the list of results, formatted by the current formatter
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
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EmpresaPeer::CO_EMPRESA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EmpresaPeer::CO_EMPRESA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the co_empresa column
     *
     * Example usage:
     * <code>
     * $query->filterByCoEmpresa(1234); // WHERE co_empresa = 1234
     * $query->filterByCoEmpresa(array(12, 34)); // WHERE co_empresa IN (12, 34)
     * $query->filterByCoEmpresa(array('min' => 12)); // WHERE co_empresa >= 12
     * $query->filterByCoEmpresa(array('max' => 12)); // WHERE co_empresa <= 12
     * </code>
     *
     * @param     mixed $coEmpresa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function filterByCoEmpresa($coEmpresa = null, $comparison = null)
    {
        if (is_array($coEmpresa)) {
            $useMinMax = false;
            if (isset($coEmpresa['min'])) {
                $this->addUsingAlias(EmpresaPeer::CO_EMPRESA, $coEmpresa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coEmpresa['max'])) {
                $this->addUsingAlias(EmpresaPeer::CO_EMPRESA, $coEmpresa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmpresaPeer::CO_EMPRESA, $coEmpresa, $comparison);
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
     * @return EmpresaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EmpresaPeer::NO_EMPRESA, $noEmpresa, $comparison);
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
     * @return EmpresaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EmpresaPeer::NO_DOMINIO, $noDominio, $comparison);
    }

    /**
     * Filter the query by a related Colaborador object
     *
     * @param   Colaborador|PropelObjectCollection $colaborador  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EmpresaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByColaborador($colaborador, $comparison = null)
    {
        if ($colaborador instanceof Colaborador) {
            return $this
                ->addUsingAlias(EmpresaPeer::CO_EMPRESA, $colaborador->getCoEmpresa(), $comparison);
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
     * @return EmpresaQuery The current query, for fluid interface
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
     * @param   Empresa $empresa Object to remove from the list of results
     *
     * @return EmpresaQuery The current query, for fluid interface
     */
    public function prune($empresa = null)
    {
        if ($empresa) {
            $this->addUsingAlias(EmpresaPeer::CO_EMPRESA, $empresa->getCoEmpresa(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
