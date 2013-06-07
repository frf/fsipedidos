<?php


/**
 * Base class that represents a query for the 'usuario' table.
 *
 *
 *
 * @method UsuarioQuery orderByDsPassword($order = Criteria::ASC) Order by the ds_password column
 * @method UsuarioQuery orderByDtUltimoLogin($order = Criteria::ASC) Order by the dt_ultimo_login column
 * @method UsuarioQuery orderByDsLogin($order = Criteria::ASC) Order by the ds_login column
 * @method UsuarioQuery orderByCoPerfil($order = Criteria::ASC) Order by the co_perfil column
 * @method UsuarioQuery orderByCoPessoa($order = Criteria::ASC) Order by the co_pessoa column
 * @method UsuarioQuery orderByCoUsuario($order = Criteria::ASC) Order by the co_usuario column
 *
 * @method UsuarioQuery groupByDsPassword() Group by the ds_password column
 * @method UsuarioQuery groupByDtUltimoLogin() Group by the dt_ultimo_login column
 * @method UsuarioQuery groupByDsLogin() Group by the ds_login column
 * @method UsuarioQuery groupByCoPerfil() Group by the co_perfil column
 * @method UsuarioQuery groupByCoPessoa() Group by the co_pessoa column
 * @method UsuarioQuery groupByCoUsuario() Group by the co_usuario column
 *
 * @method UsuarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UsuarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UsuarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UsuarioQuery leftJoinPerfil($relationAlias = null) Adds a LEFT JOIN clause to the query using the Perfil relation
 * @method UsuarioQuery rightJoinPerfil($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Perfil relation
 * @method UsuarioQuery innerJoinPerfil($relationAlias = null) Adds a INNER JOIN clause to the query using the Perfil relation
 *
 * @method UsuarioQuery leftJoinPessoa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pessoa relation
 * @method UsuarioQuery rightJoinPessoa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pessoa relation
 * @method UsuarioQuery innerJoinPessoa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pessoa relation
 *
 * @method Usuario findOne(PropelPDO $con = null) Return the first Usuario matching the query
 * @method Usuario findOneOrCreate(PropelPDO $con = null) Return the first Usuario matching the query, or a new Usuario object populated from the query conditions when no match is found
 *
 * @method Usuario findOneByDsPassword(string $ds_password) Return the first Usuario filtered by the ds_password column
 * @method Usuario findOneByDtUltimoLogin(string $dt_ultimo_login) Return the first Usuario filtered by the dt_ultimo_login column
 * @method Usuario findOneByDsLogin(string $ds_login) Return the first Usuario filtered by the ds_login column
 * @method Usuario findOneByCoPerfil(int $co_perfil) Return the first Usuario filtered by the co_perfil column
 * @method Usuario findOneByCoPessoa(int $co_pessoa) Return the first Usuario filtered by the co_pessoa column
 *
 * @method array findByDsPassword(string $ds_password) Return Usuario objects filtered by the ds_password column
 * @method array findByDtUltimoLogin(string $dt_ultimo_login) Return Usuario objects filtered by the dt_ultimo_login column
 * @method array findByDsLogin(string $ds_login) Return Usuario objects filtered by the ds_login column
 * @method array findByCoPerfil(int $co_perfil) Return Usuario objects filtered by the co_perfil column
 * @method array findByCoPessoa(int $co_pessoa) Return Usuario objects filtered by the co_pessoa column
 * @method array findByCoUsuario(int $co_usuario) Return Usuario objects filtered by the co_usuario column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseUsuarioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUsuarioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Usuario', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UsuarioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UsuarioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UsuarioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UsuarioQuery) {
            return $criteria;
        }
        $query = new UsuarioQuery();
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
     * @return   Usuario|Usuario[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UsuarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Usuario A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCoUsuario($key, $con = null)
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
     * @return                 Usuario A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ds_password, dt_ultimo_login, ds_login, co_perfil, co_pessoa, co_usuario FROM usuario WHERE co_usuario = :p0';
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
            $obj = new Usuario();
            $obj->hydrate($row);
            UsuarioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Usuario|Usuario[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Usuario[]|mixed the list of results, formatted by the current formatter
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
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsuarioPeer::CO_USUARIO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsuarioPeer::CO_USUARIO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ds_password column
     *
     * Example usage:
     * <code>
     * $query->filterByDsPassword('fooValue');   // WHERE ds_password = 'fooValue'
     * $query->filterByDsPassword('%fooValue%'); // WHERE ds_password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsPassword The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByDsPassword($dsPassword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsPassword)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsPassword)) {
                $dsPassword = str_replace('*', '%', $dsPassword);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::DS_PASSWORD, $dsPassword, $comparison);
    }

    /**
     * Filter the query on the dt_ultimo_login column
     *
     * Example usage:
     * <code>
     * $query->filterByDtUltimoLogin('2011-03-14'); // WHERE dt_ultimo_login = '2011-03-14'
     * $query->filterByDtUltimoLogin('now'); // WHERE dt_ultimo_login = '2011-03-14'
     * $query->filterByDtUltimoLogin(array('max' => 'yesterday')); // WHERE dt_ultimo_login > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtUltimoLogin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByDtUltimoLogin($dtUltimoLogin = null, $comparison = null)
    {
        if (is_array($dtUltimoLogin)) {
            $useMinMax = false;
            if (isset($dtUltimoLogin['min'])) {
                $this->addUsingAlias(UsuarioPeer::DT_ULTIMO_LOGIN, $dtUltimoLogin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtUltimoLogin['max'])) {
                $this->addUsingAlias(UsuarioPeer::DT_ULTIMO_LOGIN, $dtUltimoLogin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::DT_ULTIMO_LOGIN, $dtUltimoLogin, $comparison);
    }

    /**
     * Filter the query on the ds_login column
     *
     * Example usage:
     * <code>
     * $query->filterByDsLogin('fooValue');   // WHERE ds_login = 'fooValue'
     * $query->filterByDsLogin('%fooValue%'); // WHERE ds_login LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsLogin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByDsLogin($dsLogin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsLogin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsLogin)) {
                $dsLogin = str_replace('*', '%', $dsLogin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::DS_LOGIN, $dsLogin, $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByCoPerfil($coPerfil = null, $comparison = null)
    {
        if (is_array($coPerfil)) {
            $useMinMax = false;
            if (isset($coPerfil['min'])) {
                $this->addUsingAlias(UsuarioPeer::CO_PERFIL, $coPerfil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coPerfil['max'])) {
                $this->addUsingAlias(UsuarioPeer::CO_PERFIL, $coPerfil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::CO_PERFIL, $coPerfil, $comparison);
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
     * @see       filterByPessoa()
     *
     * @param     mixed $coPessoa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByCoPessoa($coPessoa = null, $comparison = null)
    {
        if (is_array($coPessoa)) {
            $useMinMax = false;
            if (isset($coPessoa['min'])) {
                $this->addUsingAlias(UsuarioPeer::CO_PESSOA, $coPessoa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coPessoa['max'])) {
                $this->addUsingAlias(UsuarioPeer::CO_PESSOA, $coPessoa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::CO_PESSOA, $coPessoa, $comparison);
    }

    /**
     * Filter the query on the co_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByCoUsuario(1234); // WHERE co_usuario = 1234
     * $query->filterByCoUsuario(array(12, 34)); // WHERE co_usuario IN (12, 34)
     * $query->filterByCoUsuario(array('min' => 12)); // WHERE co_usuario >= 12
     * $query->filterByCoUsuario(array('max' => 12)); // WHERE co_usuario <= 12
     * </code>
     *
     * @param     mixed $coUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByCoUsuario($coUsuario = null, $comparison = null)
    {
        if (is_array($coUsuario)) {
            $useMinMax = false;
            if (isset($coUsuario['min'])) {
                $this->addUsingAlias(UsuarioPeer::CO_USUARIO, $coUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coUsuario['max'])) {
                $this->addUsingAlias(UsuarioPeer::CO_USUARIO, $coUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::CO_USUARIO, $coUsuario, $comparison);
    }

    /**
     * Filter the query by a related Perfil object
     *
     * @param   Perfil|PropelObjectCollection $perfil The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsuarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPerfil($perfil, $comparison = null)
    {
        if ($perfil instanceof Perfil) {
            return $this
                ->addUsingAlias(UsuarioPeer::CO_PERFIL, $perfil->getCoPerfil(), $comparison);
        } elseif ($perfil instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsuarioPeer::CO_PERFIL, $perfil->toKeyValue('PrimaryKey', 'CoPerfil'), $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function joinPerfil($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePerfilQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPerfil($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Perfil', 'PerfilQuery');
    }

    /**
     * Filter the query by a related Pessoa object
     *
     * @param   Pessoa|PropelObjectCollection $pessoa The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsuarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPessoa($pessoa, $comparison = null)
    {
        if ($pessoa instanceof Pessoa) {
            return $this
                ->addUsingAlias(UsuarioPeer::CO_PESSOA, $pessoa->getCoPessoa(), $comparison);
        } elseif ($pessoa instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsuarioPeer::CO_PESSOA, $pessoa->toKeyValue('PrimaryKey', 'CoPessoa'), $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Usuario $usuario Object to remove from the list of results
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function prune($usuario = null)
    {
        if ($usuario) {
            $this->addUsingAlias(UsuarioPeer::CO_USUARIO, $usuario->getCoUsuario(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
