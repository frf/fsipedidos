<?php


/**
 * Base static class for performing query and update operations on the 'colaboradores.colaborador' table.
 *
 *
 *
 * @package propel.generator.semp.om
 */
abstract class BaseColaboradorPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'semp';

    /** the table name for this class */
    const TABLE_NAME = 'colaboradores.colaborador';

    /** the related Propel class for this table */
    const OM_CLASS = 'Colaborador';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ColaboradorTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 7;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 7;

    /** the column name for the co_colaborador field */
    const CO_COLABORADOR = 'colaboradores.colaborador.co_colaborador';

    /** the column name for the ds_email field */
    const DS_EMAIL = 'colaboradores.colaborador.ds_email';

    /** the column name for the ds_senha field */
    const DS_SENHA = 'colaboradores.colaborador.ds_senha';

    /** the column name for the co_empresa field */
    const CO_EMPRESA = 'colaboradores.colaborador.co_empresa';

    /** the column name for the co_perfil field */
    const CO_PERFIL = 'colaboradores.colaborador.co_perfil';

    /** the column name for the tp_administrador field */
    const TP_ADMINISTRADOR = 'colaboradores.colaborador.tp_administrador';

    /** the column name for the ds_telefone field */
    const DS_TELEFONE = 'colaboradores.colaborador.ds_telefone';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Colaborador objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Colaborador[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ColaboradorPeer::$fieldNames[ColaboradorPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('CoColaborador', 'DsEmail', 'DsSenha', 'CoEmpresa', 'CoPerfil', 'TpAdministrador', 'DsTelefone', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('coColaborador', 'dsEmail', 'dsSenha', 'coEmpresa', 'coPerfil', 'tpAdministrador', 'dsTelefone', ),
        BasePeer::TYPE_COLNAME => array (ColaboradorPeer::CO_COLABORADOR, ColaboradorPeer::DS_EMAIL, ColaboradorPeer::DS_SENHA, ColaboradorPeer::CO_EMPRESA, ColaboradorPeer::CO_PERFIL, ColaboradorPeer::TP_ADMINISTRADOR, ColaboradorPeer::DS_TELEFONE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('CO_COLABORADOR', 'DS_EMAIL', 'DS_SENHA', 'CO_EMPRESA', 'CO_PERFIL', 'TP_ADMINISTRADOR', 'DS_TELEFONE', ),
        BasePeer::TYPE_FIELDNAME => array ('co_colaborador', 'ds_email', 'ds_senha', 'co_empresa', 'co_perfil', 'tp_administrador', 'ds_telefone', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ColaboradorPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('CoColaborador' => 0, 'DsEmail' => 1, 'DsSenha' => 2, 'CoEmpresa' => 3, 'CoPerfil' => 4, 'TpAdministrador' => 5, 'DsTelefone' => 6, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('coColaborador' => 0, 'dsEmail' => 1, 'dsSenha' => 2, 'coEmpresa' => 3, 'coPerfil' => 4, 'tpAdministrador' => 5, 'dsTelefone' => 6, ),
        BasePeer::TYPE_COLNAME => array (ColaboradorPeer::CO_COLABORADOR => 0, ColaboradorPeer::DS_EMAIL => 1, ColaboradorPeer::DS_SENHA => 2, ColaboradorPeer::CO_EMPRESA => 3, ColaboradorPeer::CO_PERFIL => 4, ColaboradorPeer::TP_ADMINISTRADOR => 5, ColaboradorPeer::DS_TELEFONE => 6, ),
        BasePeer::TYPE_RAW_COLNAME => array ('CO_COLABORADOR' => 0, 'DS_EMAIL' => 1, 'DS_SENHA' => 2, 'CO_EMPRESA' => 3, 'CO_PERFIL' => 4, 'TP_ADMINISTRADOR' => 5, 'DS_TELEFONE' => 6, ),
        BasePeer::TYPE_FIELDNAME => array ('co_colaborador' => 0, 'ds_email' => 1, 'ds_senha' => 2, 'co_empresa' => 3, 'co_perfil' => 4, 'tp_administrador' => 5, 'ds_telefone' => 6, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = ColaboradorPeer::getFieldNames($toType);
        $key = isset(ColaboradorPeer::$fieldKeys[$fromType][$name]) ? ColaboradorPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ColaboradorPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, ColaboradorPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ColaboradorPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. ColaboradorPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ColaboradorPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ColaboradorPeer::CO_COLABORADOR);
            $criteria->addSelectColumn(ColaboradorPeer::DS_EMAIL);
            $criteria->addSelectColumn(ColaboradorPeer::DS_SENHA);
            $criteria->addSelectColumn(ColaboradorPeer::CO_EMPRESA);
            $criteria->addSelectColumn(ColaboradorPeer::CO_PERFIL);
            $criteria->addSelectColumn(ColaboradorPeer::TP_ADMINISTRADOR);
            $criteria->addSelectColumn(ColaboradorPeer::DS_TELEFONE);
        } else {
            $criteria->addSelectColumn($alias . '.co_colaborador');
            $criteria->addSelectColumn($alias . '.ds_email');
            $criteria->addSelectColumn($alias . '.ds_senha');
            $criteria->addSelectColumn($alias . '.co_empresa');
            $criteria->addSelectColumn($alias . '.co_perfil');
            $criteria->addSelectColumn($alias . '.tp_administrador');
            $criteria->addSelectColumn($alias . '.ds_telefone');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ColaboradorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ColaboradorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Colaborador
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ColaboradorPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return ColaboradorPeer::populateObjects(ColaboradorPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ColaboradorPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Colaborador $obj A Colaborador object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getCoColaborador();
            } // if key === null
            ColaboradorPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Colaborador object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Colaborador) {
                $key = (string) $value->getCoColaborador();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Colaborador object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ColaboradorPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Colaborador Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ColaboradorPeer::$instances[$key])) {
                return ColaboradorPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (ColaboradorPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ColaboradorPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to colaboradores.colaborador
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = ColaboradorPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ColaboradorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ColaboradorPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ColaboradorPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Colaborador object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ColaboradorPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ColaboradorPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ColaboradorPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ColaboradorPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ColaboradorPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Pessoa table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPessoa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ColaboradorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ColaboradorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ColaboradorPeer::CO_COLABORADOR, PessoaPeer::CO_PESSOA, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Empresa table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinEmpresa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ColaboradorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ColaboradorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ColaboradorPeer::CO_EMPRESA, EmpresaPeer::CO_EMPRESA, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Perfil table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPerfil(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ColaboradorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ColaboradorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ColaboradorPeer::CO_PERFIL, PerfilPeer::CO_PERFIL, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Colaborador objects pre-filled with their Pessoa objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Colaborador objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPessoa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);
        }

        ColaboradorPeer::addSelectColumns($criteria);
        $startcol = ColaboradorPeer::NUM_HYDRATE_COLUMNS;
        PessoaPeer::addSelectColumns($criteria);

        $criteria->addJoin(ColaboradorPeer::CO_COLABORADOR, PessoaPeer::CO_PESSOA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ColaboradorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ColaboradorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ColaboradorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ColaboradorPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PessoaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PessoaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PessoaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PessoaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Colaborador) to $obj2 (Pessoa)
                // one to one relationship
                $obj1->setPessoa($obj2);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Colaborador objects pre-filled with their Empresa objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Colaborador objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinEmpresa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);
        }

        ColaboradorPeer::addSelectColumns($criteria);
        $startcol = ColaboradorPeer::NUM_HYDRATE_COLUMNS;
        EmpresaPeer::addSelectColumns($criteria);

        $criteria->addJoin(ColaboradorPeer::CO_EMPRESA, EmpresaPeer::CO_EMPRESA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ColaboradorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ColaboradorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ColaboradorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ColaboradorPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = EmpresaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = EmpresaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = EmpresaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    EmpresaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Colaborador) to $obj2 (Empresa)
                $obj2->addColaborador($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Colaborador objects pre-filled with their Perfil objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Colaborador objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPerfil(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);
        }

        ColaboradorPeer::addSelectColumns($criteria);
        $startcol = ColaboradorPeer::NUM_HYDRATE_COLUMNS;
        PerfilPeer::addSelectColumns($criteria);

        $criteria->addJoin(ColaboradorPeer::CO_PERFIL, PerfilPeer::CO_PERFIL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ColaboradorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ColaboradorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ColaboradorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ColaboradorPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PerfilPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PerfilPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PerfilPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Colaborador) to $obj2 (Perfil)
                $obj2->addColaborador($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ColaboradorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ColaboradorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ColaboradorPeer::CO_COLABORADOR, PessoaPeer::CO_PESSOA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_EMPRESA, EmpresaPeer::CO_EMPRESA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_PERFIL, PerfilPeer::CO_PERFIL, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Colaborador objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Colaborador objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);
        }

        ColaboradorPeer::addSelectColumns($criteria);
        $startcol2 = ColaboradorPeer::NUM_HYDRATE_COLUMNS;

        PessoaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PessoaPeer::NUM_HYDRATE_COLUMNS;

        EmpresaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + EmpresaPeer::NUM_HYDRATE_COLUMNS;

        PerfilPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PerfilPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ColaboradorPeer::CO_COLABORADOR, PessoaPeer::CO_PESSOA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_EMPRESA, EmpresaPeer::CO_EMPRESA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_PERFIL, PerfilPeer::CO_PERFIL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ColaboradorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ColaboradorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ColaboradorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ColaboradorPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Pessoa rows

            $key2 = PessoaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = PessoaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PessoaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PessoaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Colaborador) to the collection in $obj2 (Pessoa)
                $obj1->setPessoa($obj2);
            } // if joined row not null

            // Add objects for joined Empresa rows

            $key3 = EmpresaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = EmpresaPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = EmpresaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    EmpresaPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Colaborador) to the collection in $obj3 (Empresa)
                $obj3->addColaborador($obj1);
            } // if joined row not null

            // Add objects for joined Perfil rows

            $key4 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = PerfilPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = PerfilPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PerfilPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Colaborador) to the collection in $obj4 (Perfil)
                $obj4->addColaborador($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Pessoa table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPessoa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ColaboradorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ColaboradorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ColaboradorPeer::CO_EMPRESA, EmpresaPeer::CO_EMPRESA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_PERFIL, PerfilPeer::CO_PERFIL, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Empresa table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptEmpresa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ColaboradorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ColaboradorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ColaboradorPeer::CO_COLABORADOR, PessoaPeer::CO_PESSOA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_PERFIL, PerfilPeer::CO_PERFIL, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Perfil table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPerfil(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ColaboradorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ColaboradorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ColaboradorPeer::CO_COLABORADOR, PessoaPeer::CO_PESSOA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_EMPRESA, EmpresaPeer::CO_EMPRESA, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Colaborador objects pre-filled with all related objects except Pessoa.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Colaborador objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPessoa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);
        }

        ColaboradorPeer::addSelectColumns($criteria);
        $startcol2 = ColaboradorPeer::NUM_HYDRATE_COLUMNS;

        EmpresaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + EmpresaPeer::NUM_HYDRATE_COLUMNS;

        PerfilPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PerfilPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ColaboradorPeer::CO_EMPRESA, EmpresaPeer::CO_EMPRESA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_PERFIL, PerfilPeer::CO_PERFIL, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ColaboradorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ColaboradorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ColaboradorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ColaboradorPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Empresa rows

                $key2 = EmpresaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = EmpresaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = EmpresaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    EmpresaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Colaborador) to the collection in $obj2 (Empresa)
                $obj2->addColaborador($obj1);

            } // if joined row is not null

                // Add objects for joined Perfil rows

                $key3 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PerfilPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = PerfilPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PerfilPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Colaborador) to the collection in $obj3 (Perfil)
                $obj3->addColaborador($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Colaborador objects pre-filled with all related objects except Empresa.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Colaborador objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptEmpresa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);
        }

        ColaboradorPeer::addSelectColumns($criteria);
        $startcol2 = ColaboradorPeer::NUM_HYDRATE_COLUMNS;

        PessoaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PessoaPeer::NUM_HYDRATE_COLUMNS;

        PerfilPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PerfilPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ColaboradorPeer::CO_COLABORADOR, PessoaPeer::CO_PESSOA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_PERFIL, PerfilPeer::CO_PERFIL, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ColaboradorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ColaboradorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ColaboradorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ColaboradorPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Pessoa rows

                $key2 = PessoaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PessoaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = PessoaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PessoaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Colaborador) to the collection in $obj2 (Pessoa)
                $obj1->setPessoa($obj2);

            } // if joined row is not null

                // Add objects for joined Perfil rows

                $key3 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PerfilPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = PerfilPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PerfilPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Colaborador) to the collection in $obj3 (Perfil)
                $obj3->addColaborador($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Colaborador objects pre-filled with all related objects except Perfil.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Colaborador objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPerfil(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);
        }

        ColaboradorPeer::addSelectColumns($criteria);
        $startcol2 = ColaboradorPeer::NUM_HYDRATE_COLUMNS;

        PessoaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PessoaPeer::NUM_HYDRATE_COLUMNS;

        EmpresaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + EmpresaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ColaboradorPeer::CO_COLABORADOR, PessoaPeer::CO_PESSOA, $join_behavior);

        $criteria->addJoin(ColaboradorPeer::CO_EMPRESA, EmpresaPeer::CO_EMPRESA, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ColaboradorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ColaboradorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ColaboradorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ColaboradorPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Pessoa rows

                $key2 = PessoaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PessoaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = PessoaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PessoaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Colaborador) to the collection in $obj2 (Pessoa)
                $obj1->setPessoa($obj2);

            } // if joined row is not null

                // Add objects for joined Empresa rows

                $key3 = EmpresaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = EmpresaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = EmpresaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    EmpresaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Colaborador) to the collection in $obj3 (Empresa)
                $obj3->addColaborador($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(ColaboradorPeer::DATABASE_NAME)->getTable(ColaboradorPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseColaboradorPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseColaboradorPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ColaboradorTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return ColaboradorPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Colaborador or Criteria object.
     *
     * @param      mixed $values Criteria or Colaborador object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Colaborador object
        }


        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Colaborador or Criteria object.
     *
     * @param      mixed $values Criteria or Colaborador object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ColaboradorPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ColaboradorPeer::CO_COLABORADOR);
            $value = $criteria->remove(ColaboradorPeer::CO_COLABORADOR);
            if ($value) {
                $selectCriteria->add(ColaboradorPeer::CO_COLABORADOR, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ColaboradorPeer::TABLE_NAME);
            }

        } else { // $values is Colaborador object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the colaboradores.colaborador table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ColaboradorPeer::TABLE_NAME, $con, ColaboradorPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ColaboradorPeer::clearInstancePool();
            ColaboradorPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Colaborador or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Colaborador object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ColaboradorPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Colaborador) { // it's a model object
            // invalidate the cache for this single object
            ColaboradorPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ColaboradorPeer::DATABASE_NAME);
            $criteria->add(ColaboradorPeer::CO_COLABORADOR, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ColaboradorPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ColaboradorPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ColaboradorPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Colaborador object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Colaborador $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ColaboradorPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ColaboradorPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(ColaboradorPeer::DATABASE_NAME, ColaboradorPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Colaborador
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ColaboradorPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ColaboradorPeer::DATABASE_NAME);
        $criteria->add(ColaboradorPeer::CO_COLABORADOR, $pk);

        $v = ColaboradorPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Colaborador[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ColaboradorPeer::DATABASE_NAME);
            $criteria->add(ColaboradorPeer::CO_COLABORADOR, $pks, Criteria::IN);
            $objs = ColaboradorPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseColaboradorPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseColaboradorPeer::buildTableMap();

