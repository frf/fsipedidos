<?php


/**
 * Base class that represents a query for the 'colaboradores.colaborador' table.
 *
 *
 *
 * @method ColaboradorQuery orderByCoColaborador($order = Criteria::ASC) Order by the co_colaborador column
 * @method ColaboradorQuery orderByDsEmail($order = Criteria::ASC) Order by the ds_email column
 * @method ColaboradorQuery orderByDsSenha($order = Criteria::ASC) Order by the ds_senha column
 * @method ColaboradorQuery orderByCoEmpresa($order = Criteria::ASC) Order by the co_empresa column
 * @method ColaboradorQuery orderByCoPerfil($order = Criteria::ASC) Order by the co_perfil column
 * @method ColaboradorQuery orderByTpAdministrador($order = Criteria::ASC) Order by the tp_administrador column
 * @method ColaboradorQuery orderByDsTelefone($order = Criteria::ASC) Order by the ds_telefone column
 *
 * @method ColaboradorQuery groupByCoColaborador() Group by the co_colaborador column
 * @method ColaboradorQuery groupByDsEmail() Group by the ds_email column
 * @method ColaboradorQuery groupByDsSenha() Group by the ds_senha column
 * @method ColaboradorQuery groupByCoEmpresa() Group by the co_empresa column
 * @method ColaboradorQuery groupByCoPerfil() Group by the co_perfil column
 * @method ColaboradorQuery groupByTpAdministrador() Group by the tp_administrador column
 * @method ColaboradorQuery groupByDsTelefone() Group by the ds_telefone column
 *
 * @method ColaboradorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ColaboradorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ColaboradorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ColaboradorQuery leftJoinPessoa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pessoa relation
 * @method ColaboradorQuery rightJoinPessoa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pessoa relation
 * @method ColaboradorQuery innerJoinPessoa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pessoa relation
 *
 * @method ColaboradorQuery leftJoinEmpresa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Empresa relation
 * @method ColaboradorQuery rightJoinEmpresa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Empresa relation
 * @method ColaboradorQuery innerJoinEmpresa($relationAlias = null) Adds a INNER JOIN clause to the query using the Empresa relation
 *
 * @method ColaboradorQuery leftJoinPerfil($relationAlias = null) Adds a LEFT JOIN clause to the query using the Perfil relation
 * @method ColaboradorQuery rightJoinPerfil($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Perfil relation
 * @method ColaboradorQuery innerJoinPerfil($relationAlias = null) Adds a INNER JOIN clause to the query using the Perfil relation
 *
 * @method ColaboradorQuery leftJoinClienteColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClienteColaborador relation
 * @method ColaboradorQuery rightJoinClienteColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClienteColaborador relation
 * @method ColaboradorQuery innerJoinClienteColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the ClienteColaborador relation
 *
 * @method ColaboradorQuery leftJoinRepresentadaColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the RepresentadaColaborador relation
 * @method ColaboradorQuery rightJoinRepresentadaColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RepresentadaColaborador relation
 * @method ColaboradorQuery innerJoinRepresentadaColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the RepresentadaColaborador relation
 *
 * @method Colaborador findOne(PropelPDO $con = null) Return the first Colaborador matching the query
 * @method Colaborador findOneOrCreate(PropelPDO $con = null) Return the first Colaborador matching the query, or a new Colaborador object populated from the query conditions when no match is found
 *
 * @method Colaborador findOneByDsEmail(string $ds_email) Return the first Colaborador filtered by the ds_email column
 * @method Colaborador findOneByDsSenha(string $ds_senha) Return the first Colaborador filtered by the ds_senha column
 * @method Colaborador findOneByCoEmpresa(int $co_empresa) Return the first Colaborador filtered by the co_empresa column
 * @method Colaborador findOneByCoPerfil(int $co_perfil) Return the first Colaborador filtered by the co_perfil column
 * @method Colaborador findOneByTpAdministrador(boolean $tp_administrador) Return the first Colaborador filtered by the tp_administrador column
 * @method Colaborador findOneByDsTelefone(string $ds_telefone) Return the first Colaborador filtered by the ds_telefone column
 *
 * @method array findByCoColaborador(int $co_colaborador) Return Colaborador objects filtered by the co_colaborador column
 * @method array findByDsEmail(string $ds_email) Return Colaborador objects filtered by the ds_email column
 * @method array findByDsSenha(string $ds_senha) Return Colaborador objects filtered by the ds_senha column
 * @method array findByCoEmpresa(int $co_empresa) Return Colaborador objects filtered by the co_empresa column
 * @method array findByCoPerfil(int $co_perfil) Return Colaborador objects filtered by the co_perfil column
 * @method array findByTpAdministrador(boolean $tp_administrador) Return Colaborador objects filtered by the tp_administrador column
 * @method array findByDsTelefone(string $ds_telefone) Return Colaborador objects filtered by the ds_telefone column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseColaboradorQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseColaboradorQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Colaborador', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ColaboradorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ColaboradorQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ColaboradorQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ColaboradorQuery) {
            return $criteria;
        }
        $query = new ColaboradorQuery();
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
     * @return   Colaborador|Colaborador[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ColaboradorPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Colaborador A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCoColaborador($key, $con = null)
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
     * @return                 Colaborador A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_colaborador, ds_email, ds_senha, co_empresa, co_perfil, tp_administrador, ds_telefone FROM colaboradores.colaborador WHERE co_colaborador = :p0';
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
            $obj = new Colaborador();
            $obj->hydrate($row);
            ColaboradorPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Colaborador|Colaborador[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Colaborador[]|mixed the list of results, formatted by the current formatter
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
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $keys, Criteria::IN);
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
     * @see       filterByPessoa()
     *
     * @param     mixed $coColaborador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function filterByCoColaborador($coColaborador = null, $comparison = null)
    {
        if (is_array($coColaborador)) {
            $useMinMax = false;
            if (isset($coColaborador['min'])) {
                $this->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $coColaborador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coColaborador['max'])) {
                $this->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $coColaborador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $coColaborador, $comparison);
    }

    /**
     * Filter the query on the ds_email column
     *
     * Example usage:
     * <code>
     * $query->filterByDsEmail('fooValue');   // WHERE ds_email = 'fooValue'
     * $query->filterByDsEmail('%fooValue%'); // WHERE ds_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function filterByDsEmail($dsEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsEmail)) {
                $dsEmail = str_replace('*', '%', $dsEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ColaboradorPeer::DS_EMAIL, $dsEmail, $comparison);
    }

    /**
     * Filter the query on the ds_senha column
     *
     * Example usage:
     * <code>
     * $query->filterByDsSenha('fooValue');   // WHERE ds_senha = 'fooValue'
     * $query->filterByDsSenha('%fooValue%'); // WHERE ds_senha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsSenha The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function filterByDsSenha($dsSenha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsSenha)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsSenha)) {
                $dsSenha = str_replace('*', '%', $dsSenha);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ColaboradorPeer::DS_SENHA, $dsSenha, $comparison);
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
     * @see       filterByEmpresa()
     *
     * @param     mixed $coEmpresa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function filterByCoEmpresa($coEmpresa = null, $comparison = null)
    {
        if (is_array($coEmpresa)) {
            $useMinMax = false;
            if (isset($coEmpresa['min'])) {
                $this->addUsingAlias(ColaboradorPeer::CO_EMPRESA, $coEmpresa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coEmpresa['max'])) {
                $this->addUsingAlias(ColaboradorPeer::CO_EMPRESA, $coEmpresa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorPeer::CO_EMPRESA, $coEmpresa, $comparison);
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
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function filterByCoPerfil($coPerfil = null, $comparison = null)
    {
        if (is_array($coPerfil)) {
            $useMinMax = false;
            if (isset($coPerfil['min'])) {
                $this->addUsingAlias(ColaboradorPeer::CO_PERFIL, $coPerfil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coPerfil['max'])) {
                $this->addUsingAlias(ColaboradorPeer::CO_PERFIL, $coPerfil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorPeer::CO_PERFIL, $coPerfil, $comparison);
    }

    /**
     * Filter the query on the tp_administrador column
     *
     * Example usage:
     * <code>
     * $query->filterByTpAdministrador(true); // WHERE tp_administrador = true
     * $query->filterByTpAdministrador('yes'); // WHERE tp_administrador = true
     * </code>
     *
     * @param     boolean|string $tpAdministrador The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function filterByTpAdministrador($tpAdministrador = null, $comparison = null)
    {
        if (is_string($tpAdministrador)) {
            $tpAdministrador = in_array(strtolower($tpAdministrador), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ColaboradorPeer::TP_ADMINISTRADOR, $tpAdministrador, $comparison);
    }

    /**
     * Filter the query on the ds_telefone column
     *
     * Example usage:
     * <code>
     * $query->filterByDsTelefone('fooValue');   // WHERE ds_telefone = 'fooValue'
     * $query->filterByDsTelefone('%fooValue%'); // WHERE ds_telefone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsTelefone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function filterByDsTelefone($dsTelefone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsTelefone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsTelefone)) {
                $dsTelefone = str_replace('*', '%', $dsTelefone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ColaboradorPeer::DS_TELEFONE, $dsTelefone, $comparison);
    }

    /**
     * Filter the query by a related Pessoa object
     *
     * @param   Pessoa|PropelObjectCollection $pessoa The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ColaboradorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPessoa($pessoa, $comparison = null)
    {
        if ($pessoa instanceof Pessoa) {
            return $this
                ->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $pessoa->getCoPessoa(), $comparison);
        } elseif ($pessoa instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $pessoa->toKeyValue('PrimaryKey', 'CoPessoa'), $comparison);
        } else {
            throw new PropelException('filterByPessoa() only accepts arguments of type Pessoa or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pessoa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function joinPessoa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pessoa');

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
            $this->addJoinObject($join, 'Pessoa');
        }

        return $this;
    }

    /**
     * Use the Pessoa relation Pessoa object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PessoaQuery A secondary query class using the current class as primary query
     */
    public function usePessoaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPessoa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pessoa', 'PessoaQuery');
    }

    /**
     * Filter the query by a related Empresa object
     *
     * @param   Empresa|PropelObjectCollection $empresa The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ColaboradorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEmpresa($empresa, $comparison = null)
    {
        if ($empresa instanceof Empresa) {
            return $this
                ->addUsingAlias(ColaboradorPeer::CO_EMPRESA, $empresa->getCoEmpresa(), $comparison);
        } elseif ($empresa instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ColaboradorPeer::CO_EMPRESA, $empresa->toKeyValue('PrimaryKey', 'CoEmpresa'), $comparison);
        } else {
            throw new PropelException('filterByEmpresa() only accepts arguments of type Empresa or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Empresa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function joinEmpresa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Empresa');

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
            $this->addJoinObject($join, 'Empresa');
        }

        return $this;
    }

    /**
     * Use the Empresa relation Empresa object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EmpresaQuery A secondary query class using the current class as primary query
     */
    public function useEmpresaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEmpresa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Empresa', 'EmpresaQuery');
    }

    /**
     * Filter the query by a related Perfil object
     *
     * @param   Perfil|PropelObjectCollection $perfil The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ColaboradorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPerfil($perfil, $comparison = null)
    {
        if ($perfil instanceof Perfil) {
            return $this
                ->addUsingAlias(ColaboradorPeer::CO_PERFIL, $perfil->getCoPerfil(), $comparison);
        } elseif ($perfil instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ColaboradorPeer::CO_PERFIL, $perfil->toKeyValue('PrimaryKey', 'CoPerfil'), $comparison);
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
     * @return ColaboradorQuery The current query, for fluid interface
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
     * Filter the query by a related ClienteColaborador object
     *
     * @param   ClienteColaborador|PropelObjectCollection $clienteColaborador  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ColaboradorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClienteColaborador($clienteColaborador, $comparison = null)
    {
        if ($clienteColaborador instanceof ClienteColaborador) {
            return $this
                ->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $clienteColaborador->getCoColaborador(), $comparison);
        } elseif ($clienteColaborador instanceof PropelObjectCollection) {
            return $this
                ->useClienteColaboradorQuery()
                ->filterByPrimaryKeys($clienteColaborador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClienteColaborador() only accepts arguments of type ClienteColaborador or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClienteColaborador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function joinClienteColaborador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClienteColaborador');

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
            $this->addJoinObject($join, 'ClienteColaborador');
        }

        return $this;
    }

    /**
     * Use the ClienteColaborador relation ClienteColaborador object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClienteColaboradorQuery A secondary query class using the current class as primary query
     */
    public function useClienteColaboradorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClienteColaborador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClienteColaborador', 'ClienteColaboradorQuery');
    }

    /**
     * Filter the query by a related RepresentadaColaborador object
     *
     * @param   RepresentadaColaborador|PropelObjectCollection $representadaColaborador  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ColaboradorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRepresentadaColaborador($representadaColaborador, $comparison = null)
    {
        if ($representadaColaborador instanceof RepresentadaColaborador) {
            return $this
                ->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $representadaColaborador->getCoColaborador(), $comparison);
        } elseif ($representadaColaborador instanceof PropelObjectCollection) {
            return $this
                ->useRepresentadaColaboradorQuery()
                ->filterByPrimaryKeys($representadaColaborador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRepresentadaColaborador() only accepts arguments of type RepresentadaColaborador or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RepresentadaColaborador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function joinRepresentadaColaborador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RepresentadaColaborador');

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
            $this->addJoinObject($join, 'RepresentadaColaborador');
        }

        return $this;
    }

    /**
     * Use the RepresentadaColaborador relation RepresentadaColaborador object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RepresentadaColaboradorQuery A secondary query class using the current class as primary query
     */
    public function useRepresentadaColaboradorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRepresentadaColaborador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RepresentadaColaborador', 'RepresentadaColaboradorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Colaborador $colaborador Object to remove from the list of results
     *
     * @return ColaboradorQuery The current query, for fluid interface
     */
    public function prune($colaborador = null)
    {
        if ($colaborador) {
            $this->addUsingAlias(ColaboradorPeer::CO_COLABORADOR, $colaborador->getCoColaborador(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
