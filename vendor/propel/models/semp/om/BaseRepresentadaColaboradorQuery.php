<?php


/**
 * Base class that represents a query for the 'representada.representada_colaborador' table.
 *
 *
 *
 * @method RepresentadaColaboradorQuery orderByCoRepresentada($order = Criteria::ASC) Order by the co_representada column
 * @method RepresentadaColaboradorQuery orderByCoColaborador($order = Criteria::ASC) Order by the co_colaborador column
 * @method RepresentadaColaboradorQuery orderByNuComissao($order = Criteria::ASC) Order by the nu_comissao column
 *
 * @method RepresentadaColaboradorQuery groupByCoRepresentada() Group by the co_representada column
 * @method RepresentadaColaboradorQuery groupByCoColaborador() Group by the co_colaborador column
 * @method RepresentadaColaboradorQuery groupByNuComissao() Group by the nu_comissao column
 *
 * @method RepresentadaColaboradorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RepresentadaColaboradorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RepresentadaColaboradorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RepresentadaColaboradorQuery leftJoinColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Colaborador relation
 * @method RepresentadaColaboradorQuery rightJoinColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Colaborador relation
 * @method RepresentadaColaboradorQuery innerJoinColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Colaborador relation
 *
 * @method RepresentadaColaboradorQuery leftJoinRepresentada($relationAlias = null) Adds a LEFT JOIN clause to the query using the Representada relation
 * @method RepresentadaColaboradorQuery rightJoinRepresentada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Representada relation
 * @method RepresentadaColaboradorQuery innerJoinRepresentada($relationAlias = null) Adds a INNER JOIN clause to the query using the Representada relation
 *
 * @method RepresentadaColaborador findOne(PropelPDO $con = null) Return the first RepresentadaColaborador matching the query
 * @method RepresentadaColaborador findOneOrCreate(PropelPDO $con = null) Return the first RepresentadaColaborador matching the query, or a new RepresentadaColaborador object populated from the query conditions when no match is found
 *
 * @method RepresentadaColaborador findOneByCoRepresentada(int $co_representada) Return the first RepresentadaColaborador filtered by the co_representada column
 * @method RepresentadaColaborador findOneByCoColaborador(int $co_colaborador) Return the first RepresentadaColaborador filtered by the co_colaborador column
 * @method RepresentadaColaborador findOneByNuComissao(string $nu_comissao) Return the first RepresentadaColaborador filtered by the nu_comissao column
 *
 * @method array findByCoRepresentada(int $co_representada) Return RepresentadaColaborador objects filtered by the co_representada column
 * @method array findByCoColaborador(int $co_colaborador) Return RepresentadaColaborador objects filtered by the co_colaborador column
 * @method array findByNuComissao(string $nu_comissao) Return RepresentadaColaborador objects filtered by the nu_comissao column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseRepresentadaColaboradorQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRepresentadaColaboradorQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'RepresentadaColaborador', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RepresentadaColaboradorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RepresentadaColaboradorQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RepresentadaColaboradorQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RepresentadaColaboradorQuery) {
            return $criteria;
        }
        $query = new RepresentadaColaboradorQuery();
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
                         A Primary key composition: [$co_representada, $co_colaborador]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   RepresentadaColaborador|RepresentadaColaborador[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RepresentadaColaboradorPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RepresentadaColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RepresentadaColaborador A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_representada, co_colaborador, nu_comissao FROM representada.representada_colaborador WHERE co_representada = :p0 AND co_colaborador = :p1';
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
            $obj = new RepresentadaColaborador();
            $obj->hydrate($row);
            RepresentadaColaboradorPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return RepresentadaColaborador|RepresentadaColaborador[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RepresentadaColaborador[]|mixed the list of results, formatted by the current formatter
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
     * @return RepresentadaColaboradorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RepresentadaColaboradorPeer::CO_REPRESENTADA, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RepresentadaColaboradorPeer::CO_COLABORADOR, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RepresentadaColaboradorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RepresentadaColaboradorPeer::CO_REPRESENTADA, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RepresentadaColaboradorPeer::CO_COLABORADOR, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the co_representada column
     *
     * Example usage:
     * <code>
     * $query->filterByCoRepresentada(1234); // WHERE co_representada = 1234
     * $query->filterByCoRepresentada(array(12, 34)); // WHERE co_representada IN (12, 34)
     * $query->filterByCoRepresentada(array('min' => 12)); // WHERE co_representada >= 12
     * $query->filterByCoRepresentada(array('max' => 12)); // WHERE co_representada <= 12
     * </code>
     *
     * @see       filterByRepresentada()
     *
     * @param     mixed $coRepresentada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RepresentadaColaboradorQuery The current query, for fluid interface
     */
    public function filterByCoRepresentada($coRepresentada = null, $comparison = null)
    {
        if (is_array($coRepresentada)) {
            $useMinMax = false;
            if (isset($coRepresentada['min'])) {
                $this->addUsingAlias(RepresentadaColaboradorPeer::CO_REPRESENTADA, $coRepresentada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coRepresentada['max'])) {
                $this->addUsingAlias(RepresentadaColaboradorPeer::CO_REPRESENTADA, $coRepresentada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RepresentadaColaboradorPeer::CO_REPRESENTADA, $coRepresentada, $comparison);
    }

    /**
     * Filter the query on the co_colaborador column
     *
     * Example usage:
     * <code>
     * $query->filterByCoColaborador(1234); // WHERE co_colaborador = 1234
     * $query->filterByCoColaborador(array(12, 34)); // WHERE co_colaborador IN (12, 34)
     * $query->filterByCoColaborador(array('min' => 12)); // WHERE co_colaborador >= 12
     * $query->filterByCoColaborador(array('max' => 12)); // WHERE co_colaborador <= 12
     * </code>
     *
     * @see       filterByColaborador()
     *
     * @param     mixed $coColaborador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RepresentadaColaboradorQuery The current query, for fluid interface
     */
    public function filterByCoColaborador($coColaborador = null, $comparison = null)
    {
        if (is_array($coColaborador)) {
            $useMinMax = false;
            if (isset($coColaborador['min'])) {
                $this->addUsingAlias(RepresentadaColaboradorPeer::CO_COLABORADOR, $coColaborador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coColaborador['max'])) {
                $this->addUsingAlias(RepresentadaColaboradorPeer::CO_COLABORADOR, $coColaborador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RepresentadaColaboradorPeer::CO_COLABORADOR, $coColaborador, $comparison);
    }

    /**
     * Filter the query on the nu_comissao column
     *
     * Example usage:
     * <code>
     * $query->filterByNuComissao('fooValue');   // WHERE nu_comissao = 'fooValue'
     * $query->filterByNuComissao('%fooValue%'); // WHERE nu_comissao LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nuComissao The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RepresentadaColaboradorQuery The current query, for fluid interface
     */
    public function filterByNuComissao($nuComissao = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nuComissao)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nuComissao)) {
                $nuComissao = str_replace('*', '%', $nuComissao);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RepresentadaColaboradorPeer::NU_COMISSAO, $nuComissao, $comparison);
    }

    /**
     * Filter the query by a related Colaborador object
     *
     * @param   Colaborador|PropelObjectCollection $colaborador The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RepresentadaColaboradorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByColaborador($colaborador, $comparison = null)
    {
        if ($colaborador instanceof Colaborador) {
            return $this
                ->addUsingAlias(RepresentadaColaboradorPeer::CO_COLABORADOR, $colaborador->getCoColaborador(), $comparison);
        } elseif ($colaborador instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RepresentadaColaboradorPeer::CO_COLABORADOR, $colaborador->toKeyValue('PrimaryKey', 'CoColaborador'), $comparison);
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
     * @return RepresentadaColaboradorQuery The current query, for fluid interface
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
     * Filter the query by a related Representada object
     *
     * @param   Representada|PropelObjectCollection $representada The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RepresentadaColaboradorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRepresentada($representada, $comparison = null)
    {
        if ($representada instanceof Representada) {
            return $this
                ->addUsingAlias(RepresentadaColaboradorPeer::CO_REPRESENTADA, $representada->getCoRepresentada(), $comparison);
        } elseif ($representada instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RepresentadaColaboradorPeer::CO_REPRESENTADA, $representada->toKeyValue('PrimaryKey', 'CoRepresentada'), $comparison);
        } else {
            throw new PropelException('filterByRepresentada() only accepts arguments of type Representada or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Representada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RepresentadaColaboradorQuery The current query, for fluid interface
     */
    public function joinRepresentada($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Representada');

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
            $this->addJoinObject($join, 'Representada');
        }

        return $this;
    }

    /**
     * Use the Representada relation Representada object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RepresentadaQuery A secondary query class using the current class as primary query
     */
    public function useRepresentadaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRepresentada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Representada', 'RepresentadaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RepresentadaColaborador $representadaColaborador Object to remove from the list of results
     *
     * @return RepresentadaColaboradorQuery The current query, for fluid interface
     */
    public function prune($representadaColaborador = null)
    {
        if ($representadaColaborador) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RepresentadaColaboradorPeer::CO_REPRESENTADA), $representadaColaborador->getCoRepresentada(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RepresentadaColaboradorPeer::CO_COLABORADOR), $representadaColaborador->getCoColaborador(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
