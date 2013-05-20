<?php


/**
 * Base class that represents a query for the 'pessoa' table.
 *
 *
 *
 * @method PessoaQuery orderByCoPessoa($order = Criteria::ASC) Order by the co_pessoa column
 * @method PessoaQuery orderByNoPessoa($order = Criteria::ASC) Order by the no_pessoa column
 * @method PessoaQuery orderByNuCpf($order = Criteria::ASC) Order by the nu_cpf column
 * @method PessoaQuery orderByNuCnpj($order = Criteria::ASC) Order by the nu_cnpj column
 *
 * @method PessoaQuery groupByCoPessoa() Group by the co_pessoa column
 * @method PessoaQuery groupByNoPessoa() Group by the no_pessoa column
 * @method PessoaQuery groupByNuCpf() Group by the nu_cpf column
 * @method PessoaQuery groupByNuCnpj() Group by the nu_cnpj column
 *
 * @method PessoaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PessoaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PessoaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PessoaQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method PessoaQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method PessoaQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method PessoaQuery leftJoinColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Colaborador relation
 * @method PessoaQuery rightJoinColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Colaborador relation
 * @method PessoaQuery innerJoinColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Colaborador relation
 *
 * @method PessoaQuery leftJoinRepresentada($relationAlias = null) Adds a LEFT JOIN clause to the query using the Representada relation
 * @method PessoaQuery rightJoinRepresentada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Representada relation
 * @method PessoaQuery innerJoinRepresentada($relationAlias = null) Adds a INNER JOIN clause to the query using the Representada relation
 *
 * @method Pessoa findOne(PropelPDO $con = null) Return the first Pessoa matching the query
 * @method Pessoa findOneOrCreate(PropelPDO $con = null) Return the first Pessoa matching the query, or a new Pessoa object populated from the query conditions when no match is found
 *
 * @method Pessoa findOneByNoPessoa(string $no_pessoa) Return the first Pessoa filtered by the no_pessoa column
 * @method Pessoa findOneByNuCpf(string $nu_cpf) Return the first Pessoa filtered by the nu_cpf column
 * @method Pessoa findOneByNuCnpj(string $nu_cnpj) Return the first Pessoa filtered by the nu_cnpj column
 *
 * @method array findByCoPessoa(int $co_pessoa) Return Pessoa objects filtered by the co_pessoa column
 * @method array findByNoPessoa(string $no_pessoa) Return Pessoa objects filtered by the no_pessoa column
 * @method array findByNuCpf(string $nu_cpf) Return Pessoa objects filtered by the nu_cpf column
 * @method array findByNuCnpj(string $nu_cnpj) Return Pessoa objects filtered by the nu_cnpj column
 *
 * @package    propel.generator.semp.om
 */
abstract class BasePessoaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePessoaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Pessoa', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PessoaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PessoaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PessoaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PessoaQuery) {
            return $criteria;
        }
        $query = new PessoaQuery();
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
     * @return   Pessoa|Pessoa[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PessoaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PessoaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Pessoa A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCoPessoa($key, $con = null)
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
     * @return                 Pessoa A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_pessoa, no_pessoa, nu_cpf, nu_cnpj FROM pessoa WHERE co_pessoa = :p0';
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
            $obj = new Pessoa();
            $obj->hydrate($row);
            PessoaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Pessoa|Pessoa[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Pessoa[]|mixed the list of results, formatted by the current formatter
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
     * @return PessoaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PessoaPeer::CO_PESSOA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PessoaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PessoaPeer::CO_PESSOA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the co_pessoa column
     *
     * Example usage:
     * <code>
     * $query->filterByCoPessoa(1234); // WHERE co_pessoa = 1234
     * $query->filterByCoPessoa(array(12, 34)); // WHERE co_pessoa IN (12, 34)
     * $query->filterByCoPessoa(array('min' => 12)); // WHERE co_pessoa >= 12
     * $query->filterByCoPessoa(array('max' => 12)); // WHERE co_pessoa <= 12
     * </code>
     *
     * @param     mixed $coPessoa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PessoaQuery The current query, for fluid interface
     */
    public function filterByCoPessoa($coPessoa = null, $comparison = null)
    {
        if (is_array($coPessoa)) {
            $useMinMax = false;
            if (isset($coPessoa['min'])) {
                $this->addUsingAlias(PessoaPeer::CO_PESSOA, $coPessoa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coPessoa['max'])) {
                $this->addUsingAlias(PessoaPeer::CO_PESSOA, $coPessoa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PessoaPeer::CO_PESSOA, $coPessoa, $comparison);
    }

    /**
     * Filter the query on the no_pessoa column
     *
     * Example usage:
     * <code>
     * $query->filterByNoPessoa('fooValue');   // WHERE no_pessoa = 'fooValue'
     * $query->filterByNoPessoa('%fooValue%'); // WHERE no_pessoa LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noPessoa The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PessoaQuery The current query, for fluid interface
     */
    public function filterByNoPessoa($noPessoa = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noPessoa)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noPessoa)) {
                $noPessoa = str_replace('*', '%', $noPessoa);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PessoaPeer::NO_PESSOA, $noPessoa, $comparison);
    }

    /**
     * Filter the query on the nu_cpf column
     *
     * Example usage:
     * <code>
     * $query->filterByNuCpf('fooValue');   // WHERE nu_cpf = 'fooValue'
     * $query->filterByNuCpf('%fooValue%'); // WHERE nu_cpf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nuCpf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PessoaQuery The current query, for fluid interface
     */
    public function filterByNuCpf($nuCpf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nuCpf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nuCpf)) {
                $nuCpf = str_replace('*', '%', $nuCpf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PessoaPeer::NU_CPF, $nuCpf, $comparison);
    }

    /**
     * Filter the query on the nu_cnpj column
     *
     * Example usage:
     * <code>
     * $query->filterByNuCnpj('fooValue');   // WHERE nu_cnpj = 'fooValue'
     * $query->filterByNuCnpj('%fooValue%'); // WHERE nu_cnpj LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nuCnpj The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PessoaQuery The current query, for fluid interface
     */
    public function filterByNuCnpj($nuCnpj = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nuCnpj)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nuCnpj)) {
                $nuCnpj = str_replace('*', '%', $nuCnpj);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PessoaPeer::NU_CNPJ, $nuCnpj, $comparison);
    }

    /**
     * Filter the query by a related Cliente object
     *
     * @param   Cliente|PropelObjectCollection $cliente  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PessoaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCliente($cliente, $comparison = null)
    {
        if ($cliente instanceof Cliente) {
            return $this
                ->addUsingAlias(PessoaPeer::CO_PESSOA, $cliente->getCoCliente(), $comparison);
        } elseif ($cliente instanceof PropelObjectCollection) {
            return $this
                ->useClienteQuery()
                ->filterByPrimaryKeys($cliente->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCliente() only accepts arguments of type Cliente or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PessoaQuery The current query, for fluid interface
     */
    public function joinCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cliente');

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
            $this->addJoinObject($join, 'Cliente');
        }

        return $this;
    }

    /**
     * Use the Cliente relation Cliente object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClienteQuery A secondary query class using the current class as primary query
     */
    public function useClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cliente', 'ClienteQuery');
    }

    /**
     * Filter the query by a related Colaborador object
     *
     * @param   Colaborador|PropelObjectCollection $colaborador  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PessoaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByColaborador($colaborador, $comparison = null)
    {
        if ($colaborador instanceof Colaborador) {
            return $this
                ->addUsingAlias(PessoaPeer::CO_PESSOA, $colaborador->getCoColaborador(), $comparison);
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
     * @return PessoaQuery The current query, for fluid interface
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
     * @param   Representada|PropelObjectCollection $representada  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PessoaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRepresentada($representada, $comparison = null)
    {
        if ($representada instanceof Representada) {
            return $this
                ->addUsingAlias(PessoaPeer::CO_PESSOA, $representada->getCoRepresentada(), $comparison);
        } elseif ($representada instanceof PropelObjectCollection) {
            return $this
                ->useRepresentadaQuery()
                ->filterByPrimaryKeys($representada->getPrimaryKeys())
                ->endUse();
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
     * @return PessoaQuery The current query, for fluid interface
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
     * @param   Pessoa $pessoa Object to remove from the list of results
     *
     * @return PessoaQuery The current query, for fluid interface
     */
    public function prune($pessoa = null)
    {
        if ($pessoa) {
            $this->addUsingAlias(PessoaPeer::CO_PESSOA, $pessoa->getCoPessoa(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
