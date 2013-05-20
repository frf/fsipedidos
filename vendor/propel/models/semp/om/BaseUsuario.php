<?php


/**
 * Base class that represents a row from the 'usuario' table.
 *
 *
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseUsuario extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'UsuarioPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UsuarioPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the co_usuario field.
     * @var        int
     */
    protected $co_usuario;

    /**
     * The value for the nu_cpf field.
     * @var        string
     */
    protected $nu_cpf;

    /**
     * The value for the ds_password field.
     * @var        string
     */
    protected $ds_password;

    /**
     * The value for the no_usuario field.
     * @var        string
     */
    protected $no_usuario;

    /**
     * The value for the ds_login field.
     * @var        string
     */
    protected $ds_login;

    /**
     * The value for the dt_ultimo_login field.
     * @var        string
     */
    protected $dt_ultimo_login;

    /**
     * The value for the ds_email field.
     * @var        string
     */
    protected $ds_email;

    /**
     * The value for the co_perfil field.
     * @var        int
     */
    protected $co_perfil;

    /**
     * The value for the nu_celular field.
     * @var        string
     */
    protected $nu_celular;

    /**
     * @var        Perfil
     */
    protected $aPerfil;

    /**
     * @var        PropelObjectCollection|Permissao[] Collection to store aggregation of Permissao objects.
     */
    protected $collPermissaosRelatedByCoUsuarioAlteracao;
    protected $collPermissaosRelatedByCoUsuarioAlteracaoPartial;

    /**
     * @var        PropelObjectCollection|Permissao[] Collection to store aggregation of Permissao objects.
     */
    protected $collPermissaosRelatedByCoUsuarioCadastro;
    protected $collPermissaosRelatedByCoUsuarioCadastroPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $permissaosRelatedByCoUsuarioCadastroScheduledForDeletion = null;

    /**
     * Get the [co_usuario] column value.
     *
     * @return int
     */
    public function getCoUsuario()
    {
        return $this->co_usuario;
    }

    /**
     * Get the [nu_cpf] column value.
     *
     * @return string
     */
    public function getNuCpf()
    {
        return $this->nu_cpf;
    }

    /**
     * Get the [ds_password] column value.
     *
     * @return string
     */
    public function getDsPassword()
    {
        return $this->ds_password;
    }

    /**
     * Get the [no_usuario] column value.
     *
     * @return string
     */
    public function getNoUsuario()
    {
        return $this->no_usuario;
    }

    /**
     * Get the [ds_login] column value.
     *
     * @return string
     */
    public function getDsLogin()
    {
        return $this->ds_login;
    }

    /**
     * Get the [optionally formatted] temporal [dt_ultimo_login] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDtUltimoLogin($format = 'd-m-Y H:i:s')
    {
        if ($this->dt_ultimo_login === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->dt_ultimo_login);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dt_ultimo_login, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [ds_email] column value.
     *
     * @return string
     */
    public function getDsEmail()
    {
        return $this->ds_email;
    }

    /**
     * Get the [co_perfil] column value.
     *
     * @return int
     */
    public function getCoPerfil()
    {
        return $this->co_perfil;
    }

    /**
     * Get the [nu_celular] column value.
     *
     * @return string
     */
    public function getNuCelular()
    {
        return $this->nu_celular;
    }

    /**
     * Set the value of [co_usuario] column.
     *
     * @param int $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setCoUsuario($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_usuario !== $v) {
            $this->co_usuario = $v;
            $this->modifiedColumns[] = UsuarioPeer::CO_USUARIO;
        }


        return $this;
    } // setCoUsuario()

    /**
     * Set the value of [nu_cpf] column.
     *
     * @param string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setNuCpf($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nu_cpf !== $v) {
            $this->nu_cpf = $v;
            $this->modifiedColumns[] = UsuarioPeer::NU_CPF;
        }


        return $this;
    } // setNuCpf()

    /**
     * Set the value of [ds_password] column.
     *
     * @param string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setDsPassword($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ds_password !== $v) {
            $this->ds_password = $v;
            $this->modifiedColumns[] = UsuarioPeer::DS_PASSWORD;
        }


        return $this;
    } // setDsPassword()

    /**
     * Set the value of [no_usuario] column.
     *
     * @param string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setNoUsuario($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_usuario !== $v) {
            $this->no_usuario = $v;
            $this->modifiedColumns[] = UsuarioPeer::NO_USUARIO;
        }


        return $this;
    } // setNoUsuario()

    /**
     * Set the value of [ds_login] column.
     *
     * @param string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setDsLogin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ds_login !== $v) {
            $this->ds_login = $v;
            $this->modifiedColumns[] = UsuarioPeer::DS_LOGIN;
        }


        return $this;
    } // setDsLogin()

    /**
     * Sets the value of [dt_ultimo_login] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Usuario The current object (for fluent API support)
     */
    public function setDtUltimoLogin($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dt_ultimo_login !== null || $dt !== null) {
            $currentDateAsString = ($this->dt_ultimo_login !== null && $tmpDt = new DateTime($this->dt_ultimo_login)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dt_ultimo_login = $newDateAsString;
                $this->modifiedColumns[] = UsuarioPeer::DT_ULTIMO_LOGIN;
            }
        } // if either are not null


        return $this;
    } // setDtUltimoLogin()

    /**
     * Set the value of [ds_email] column.
     *
     * @param string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setDsEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ds_email !== $v) {
            $this->ds_email = $v;
            $this->modifiedColumns[] = UsuarioPeer::DS_EMAIL;
        }


        return $this;
    } // setDsEmail()

    /**
     * Set the value of [co_perfil] column.
     *
     * @param int $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setCoPerfil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_perfil !== $v) {
            $this->co_perfil = $v;
            $this->modifiedColumns[] = UsuarioPeer::CO_PERFIL;
        }

        if ($this->aPerfil !== null && $this->aPerfil->getCoPerfil() !== $v) {
            $this->aPerfil = null;
        }


        return $this;
    } // setCoPerfil()

    /**
     * Set the value of [nu_celular] column.
     *
     * @param string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setNuCelular($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nu_celular !== $v) {
            $this->nu_celular = $v;
            $this->modifiedColumns[] = UsuarioPeer::NU_CELULAR;
        }


        return $this;
    } // setNuCelular()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->co_usuario = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nu_cpf = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->ds_password = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->no_usuario = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->ds_login = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->dt_ultimo_login = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->ds_email = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->co_perfil = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->nu_celular = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = UsuarioPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Usuario object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aPerfil !== null && $this->co_perfil !== $this->aPerfil->getCoPerfil()) {
            $this->aPerfil = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = UsuarioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPerfil = null;
            $this->collPermissaosRelatedByCoUsuarioAlteracao = null;

            $this->collPermissaosRelatedByCoUsuarioCadastro = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = UsuarioQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                UsuarioPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPerfil !== null) {
                if ($this->aPerfil->isModified() || $this->aPerfil->isNew()) {
                    $affectedRows += $this->aPerfil->save($con);
                }
                $this->setPerfil($this->aPerfil);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion !== null) {
                if (!$this->permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion->isEmpty()) {
                    foreach ($this->permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion as $permissaoRelatedByCoUsuarioAlteracao) {
                        // need to save related object because we set the relation to null
                        $permissaoRelatedByCoUsuarioAlteracao->save($con);
                    }
                    $this->permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion = null;
                }
            }

            if ($this->collPermissaosRelatedByCoUsuarioAlteracao !== null) {
                foreach ($this->collPermissaosRelatedByCoUsuarioAlteracao as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->permissaosRelatedByCoUsuarioCadastroScheduledForDeletion !== null) {
                if (!$this->permissaosRelatedByCoUsuarioCadastroScheduledForDeletion->isEmpty()) {
                    foreach ($this->permissaosRelatedByCoUsuarioCadastroScheduledForDeletion as $permissaoRelatedByCoUsuarioCadastro) {
                        // need to save related object because we set the relation to null
                        $permissaoRelatedByCoUsuarioCadastro->save($con);
                    }
                    $this->permissaosRelatedByCoUsuarioCadastroScheduledForDeletion = null;
                }
            }

            if ($this->collPermissaosRelatedByCoUsuarioCadastro !== null) {
                foreach ($this->collPermissaosRelatedByCoUsuarioCadastro as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = UsuarioPeer::CO_USUARIO;
        if (null !== $this->co_usuario) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UsuarioPeer::CO_USUARIO . ')');
        }
        if (null === $this->co_usuario) {
            try {
                $stmt = $con->query("SELECT nextval('usuario_co_usuario_seq')");
                $row = $stmt->fetch(PDO::FETCH_NUM);
                $this->co_usuario = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UsuarioPeer::CO_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'co_usuario';
        }
        if ($this->isColumnModified(UsuarioPeer::NU_CPF)) {
            $modifiedColumns[':p' . $index++]  = 'nu_cpf';
        }
        if ($this->isColumnModified(UsuarioPeer::DS_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'ds_password';
        }
        if ($this->isColumnModified(UsuarioPeer::NO_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'no_usuario';
        }
        if ($this->isColumnModified(UsuarioPeer::DS_LOGIN)) {
            $modifiedColumns[':p' . $index++]  = 'ds_login';
        }
        if ($this->isColumnModified(UsuarioPeer::DT_ULTIMO_LOGIN)) {
            $modifiedColumns[':p' . $index++]  = 'dt_ultimo_login';
        }
        if ($this->isColumnModified(UsuarioPeer::DS_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'ds_email';
        }
        if ($this->isColumnModified(UsuarioPeer::CO_PERFIL)) {
            $modifiedColumns[':p' . $index++]  = 'co_perfil';
        }
        if ($this->isColumnModified(UsuarioPeer::NU_CELULAR)) {
            $modifiedColumns[':p' . $index++]  = 'nu_celular';
        }

        $sql = sprintf(
            'INSERT INTO usuario (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'co_usuario':
                        $stmt->bindValue($identifier, $this->co_usuario, PDO::PARAM_INT);
                        break;
                    case 'nu_cpf':
                        $stmt->bindValue($identifier, $this->nu_cpf, PDO::PARAM_STR);
                        break;
                    case 'ds_password':
                        $stmt->bindValue($identifier, $this->ds_password, PDO::PARAM_STR);
                        break;
                    case 'no_usuario':
                        $stmt->bindValue($identifier, $this->no_usuario, PDO::PARAM_STR);
                        break;
                    case 'ds_login':
                        $stmt->bindValue($identifier, $this->ds_login, PDO::PARAM_STR);
                        break;
                    case 'dt_ultimo_login':
                        $stmt->bindValue($identifier, $this->dt_ultimo_login, PDO::PARAM_STR);
                        break;
                    case 'ds_email':
                        $stmt->bindValue($identifier, $this->ds_email, PDO::PARAM_STR);
                        break;
                    case 'co_perfil':
                        $stmt->bindValue($identifier, $this->co_perfil, PDO::PARAM_INT);
                        break;
                    case 'nu_celular':
                        $stmt->bindValue($identifier, $this->nu_celular, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPerfil !== null) {
                if (!$this->aPerfil->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPerfil->getValidationFailures());
                }
            }


            if (($retval = UsuarioPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPermissaosRelatedByCoUsuarioAlteracao !== null) {
                    foreach ($this->collPermissaosRelatedByCoUsuarioAlteracao as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPermissaosRelatedByCoUsuarioCadastro !== null) {
                    foreach ($this->collPermissaosRelatedByCoUsuarioCadastro as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getCoUsuario();
                break;
            case 1:
                return $this->getNuCpf();
                break;
            case 2:
                return $this->getDsPassword();
                break;
            case 3:
                return $this->getNoUsuario();
                break;
            case 4:
                return $this->getDsLogin();
                break;
            case 5:
                return $this->getDtUltimoLogin();
                break;
            case 6:
                return $this->getDsEmail();
                break;
            case 7:
                return $this->getCoPerfil();
                break;
            case 8:
                return $this->getNuCelular();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Usuario'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Usuario'][$this->getPrimaryKey()] = true;
        $keys = UsuarioPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCoUsuario(),
            $keys[1] => $this->getNuCpf(),
            $keys[2] => $this->getDsPassword(),
            $keys[3] => $this->getNoUsuario(),
            $keys[4] => $this->getDsLogin(),
            $keys[5] => $this->getDtUltimoLogin(),
            $keys[6] => $this->getDsEmail(),
            $keys[7] => $this->getCoPerfil(),
            $keys[8] => $this->getNuCelular(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPerfil) {
                $result['Perfil'] = $this->aPerfil->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPermissaosRelatedByCoUsuarioAlteracao) {
                $result['PermissaosRelatedByCoUsuarioAlteracao'] = $this->collPermissaosRelatedByCoUsuarioAlteracao->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPermissaosRelatedByCoUsuarioCadastro) {
                $result['PermissaosRelatedByCoUsuarioCadastro'] = $this->collPermissaosRelatedByCoUsuarioCadastro->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCoUsuario($value);
                break;
            case 1:
                $this->setNuCpf($value);
                break;
            case 2:
                $this->setDsPassword($value);
                break;
            case 3:
                $this->setNoUsuario($value);
                break;
            case 4:
                $this->setDsLogin($value);
                break;
            case 5:
                $this->setDtUltimoLogin($value);
                break;
            case 6:
                $this->setDsEmail($value);
                break;
            case 7:
                $this->setCoPerfil($value);
                break;
            case 8:
                $this->setNuCelular($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = UsuarioPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setCoUsuario($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNuCpf($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDsPassword($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNoUsuario($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDsLogin($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDtUltimoLogin($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDsEmail($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCoPerfil($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setNuCelular($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

        if ($this->isColumnModified(UsuarioPeer::CO_USUARIO)) $criteria->add(UsuarioPeer::CO_USUARIO, $this->co_usuario);
        if ($this->isColumnModified(UsuarioPeer::NU_CPF)) $criteria->add(UsuarioPeer::NU_CPF, $this->nu_cpf);
        if ($this->isColumnModified(UsuarioPeer::DS_PASSWORD)) $criteria->add(UsuarioPeer::DS_PASSWORD, $this->ds_password);
        if ($this->isColumnModified(UsuarioPeer::NO_USUARIO)) $criteria->add(UsuarioPeer::NO_USUARIO, $this->no_usuario);
        if ($this->isColumnModified(UsuarioPeer::DS_LOGIN)) $criteria->add(UsuarioPeer::DS_LOGIN, $this->ds_login);
        if ($this->isColumnModified(UsuarioPeer::DT_ULTIMO_LOGIN)) $criteria->add(UsuarioPeer::DT_ULTIMO_LOGIN, $this->dt_ultimo_login);
        if ($this->isColumnModified(UsuarioPeer::DS_EMAIL)) $criteria->add(UsuarioPeer::DS_EMAIL, $this->ds_email);
        if ($this->isColumnModified(UsuarioPeer::CO_PERFIL)) $criteria->add(UsuarioPeer::CO_PERFIL, $this->co_perfil);
        if ($this->isColumnModified(UsuarioPeer::NU_CELULAR)) $criteria->add(UsuarioPeer::NU_CELULAR, $this->nu_celular);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
        $criteria->add(UsuarioPeer::CO_USUARIO, $this->co_usuario);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getCoUsuario();
    }

    /**
     * Generic method to set the primary key (co_usuario column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCoUsuario($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getCoUsuario();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Usuario (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNuCpf($this->getNuCpf());
        $copyObj->setDsPassword($this->getDsPassword());
        $copyObj->setNoUsuario($this->getNoUsuario());
        $copyObj->setDsLogin($this->getDsLogin());
        $copyObj->setDtUltimoLogin($this->getDtUltimoLogin());
        $copyObj->setDsEmail($this->getDsEmail());
        $copyObj->setCoPerfil($this->getCoPerfil());
        $copyObj->setNuCelular($this->getNuCelular());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPermissaosRelatedByCoUsuarioAlteracao() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPermissaoRelatedByCoUsuarioAlteracao($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPermissaosRelatedByCoUsuarioCadastro() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPermissaoRelatedByCoUsuarioCadastro($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCoUsuario(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Usuario Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return UsuarioPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UsuarioPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Perfil object.
     *
     * @param             Perfil $v
     * @return Usuario The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPerfil(Perfil $v = null)
    {
        if ($v === null) {
            $this->setCoPerfil(NULL);
        } else {
            $this->setCoPerfil($v->getCoPerfil());
        }

        $this->aPerfil = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Perfil object, it will not be re-added.
        if ($v !== null) {
            $v->addUsuario($this);
        }


        return $this;
    }


    /**
     * Get the associated Perfil object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Perfil The associated Perfil object.
     * @throws PropelException
     */
    public function getPerfil(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPerfil === null && ($this->co_perfil !== null) && $doQuery) {
            $this->aPerfil = PerfilQuery::create()->findPk($this->co_perfil, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPerfil->addUsuarios($this);
             */
        }

        return $this->aPerfil;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('PermissaoRelatedByCoUsuarioAlteracao' == $relationName) {
            $this->initPermissaosRelatedByCoUsuarioAlteracao();
        }
        if ('PermissaoRelatedByCoUsuarioCadastro' == $relationName) {
            $this->initPermissaosRelatedByCoUsuarioCadastro();
        }
    }

    /**
     * Clears out the collPermissaosRelatedByCoUsuarioAlteracao collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Usuario The current object (for fluent API support)
     * @see        addPermissaosRelatedByCoUsuarioAlteracao()
     */
    public function clearPermissaosRelatedByCoUsuarioAlteracao()
    {
        $this->collPermissaosRelatedByCoUsuarioAlteracao = null; // important to set this to null since that means it is uninitialized
        $this->collPermissaosRelatedByCoUsuarioAlteracaoPartial = null;

        return $this;
    }

    /**
     * reset is the collPermissaosRelatedByCoUsuarioAlteracao collection loaded partially
     *
     * @return void
     */
    public function resetPartialPermissaosRelatedByCoUsuarioAlteracao($v = true)
    {
        $this->collPermissaosRelatedByCoUsuarioAlteracaoPartial = $v;
    }

    /**
     * Initializes the collPermissaosRelatedByCoUsuarioAlteracao collection.
     *
     * By default this just sets the collPermissaosRelatedByCoUsuarioAlteracao collection to an empty array (like clearcollPermissaosRelatedByCoUsuarioAlteracao());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPermissaosRelatedByCoUsuarioAlteracao($overrideExisting = true)
    {
        if (null !== $this->collPermissaosRelatedByCoUsuarioAlteracao && !$overrideExisting) {
            return;
        }
        $this->collPermissaosRelatedByCoUsuarioAlteracao = new PropelObjectCollection();
        $this->collPermissaosRelatedByCoUsuarioAlteracao->setModel('Permissao');
    }

    /**
     * Gets an array of Permissao objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Usuario is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Permissao[] List of Permissao objects
     * @throws PropelException
     */
    public function getPermissaosRelatedByCoUsuarioAlteracao($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPermissaosRelatedByCoUsuarioAlteracaoPartial && !$this->isNew();
        if (null === $this->collPermissaosRelatedByCoUsuarioAlteracao || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPermissaosRelatedByCoUsuarioAlteracao) {
                // return empty collection
                $this->initPermissaosRelatedByCoUsuarioAlteracao();
            } else {
                $collPermissaosRelatedByCoUsuarioAlteracao = PermissaoQuery::create(null, $criteria)
                    ->filterByUsuarioRelatedByCoUsuarioAlteracao($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPermissaosRelatedByCoUsuarioAlteracaoPartial && count($collPermissaosRelatedByCoUsuarioAlteracao)) {
                      $this->initPermissaosRelatedByCoUsuarioAlteracao(false);

                      foreach($collPermissaosRelatedByCoUsuarioAlteracao as $obj) {
                        if (false == $this->collPermissaosRelatedByCoUsuarioAlteracao->contains($obj)) {
                          $this->collPermissaosRelatedByCoUsuarioAlteracao->append($obj);
                        }
                      }

                      $this->collPermissaosRelatedByCoUsuarioAlteracaoPartial = true;
                    }

                    $collPermissaosRelatedByCoUsuarioAlteracao->getInternalIterator()->rewind();
                    return $collPermissaosRelatedByCoUsuarioAlteracao;
                }

                if($partial && $this->collPermissaosRelatedByCoUsuarioAlteracao) {
                    foreach($this->collPermissaosRelatedByCoUsuarioAlteracao as $obj) {
                        if($obj->isNew()) {
                            $collPermissaosRelatedByCoUsuarioAlteracao[] = $obj;
                        }
                    }
                }

                $this->collPermissaosRelatedByCoUsuarioAlteracao = $collPermissaosRelatedByCoUsuarioAlteracao;
                $this->collPermissaosRelatedByCoUsuarioAlteracaoPartial = false;
            }
        }

        return $this->collPermissaosRelatedByCoUsuarioAlteracao;
    }

    /**
     * Sets a collection of PermissaoRelatedByCoUsuarioAlteracao objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $permissaosRelatedByCoUsuarioAlteracao A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Usuario The current object (for fluent API support)
     */
    public function setPermissaosRelatedByCoUsuarioAlteracao(PropelCollection $permissaosRelatedByCoUsuarioAlteracao, PropelPDO $con = null)
    {
        $permissaosRelatedByCoUsuarioAlteracaoToDelete = $this->getPermissaosRelatedByCoUsuarioAlteracao(new Criteria(), $con)->diff($permissaosRelatedByCoUsuarioAlteracao);

        $this->permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion = unserialize(serialize($permissaosRelatedByCoUsuarioAlteracaoToDelete));

        foreach ($permissaosRelatedByCoUsuarioAlteracaoToDelete as $permissaoRelatedByCoUsuarioAlteracaoRemoved) {
            $permissaoRelatedByCoUsuarioAlteracaoRemoved->setUsuarioRelatedByCoUsuarioAlteracao(null);
        }

        $this->collPermissaosRelatedByCoUsuarioAlteracao = null;
        foreach ($permissaosRelatedByCoUsuarioAlteracao as $permissaoRelatedByCoUsuarioAlteracao) {
            $this->addPermissaoRelatedByCoUsuarioAlteracao($permissaoRelatedByCoUsuarioAlteracao);
        }

        $this->collPermissaosRelatedByCoUsuarioAlteracao = $permissaosRelatedByCoUsuarioAlteracao;
        $this->collPermissaosRelatedByCoUsuarioAlteracaoPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Permissao objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Permissao objects.
     * @throws PropelException
     */
    public function countPermissaosRelatedByCoUsuarioAlteracao(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPermissaosRelatedByCoUsuarioAlteracaoPartial && !$this->isNew();
        if (null === $this->collPermissaosRelatedByCoUsuarioAlteracao || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPermissaosRelatedByCoUsuarioAlteracao) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPermissaosRelatedByCoUsuarioAlteracao());
            }
            $query = PermissaoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsuarioRelatedByCoUsuarioAlteracao($this)
                ->count($con);
        }

        return count($this->collPermissaosRelatedByCoUsuarioAlteracao);
    }

    /**
     * Method called to associate a Permissao object to this object
     * through the Permissao foreign key attribute.
     *
     * @param    Permissao $l Permissao
     * @return Usuario The current object (for fluent API support)
     */
    public function addPermissaoRelatedByCoUsuarioAlteracao(Permissao $l)
    {
        if ($this->collPermissaosRelatedByCoUsuarioAlteracao === null) {
            $this->initPermissaosRelatedByCoUsuarioAlteracao();
            $this->collPermissaosRelatedByCoUsuarioAlteracaoPartial = true;
        }
        if (!in_array($l, $this->collPermissaosRelatedByCoUsuarioAlteracao->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPermissaoRelatedByCoUsuarioAlteracao($l);
        }

        return $this;
    }

    /**
     * @param	PermissaoRelatedByCoUsuarioAlteracao $permissaoRelatedByCoUsuarioAlteracao The permissaoRelatedByCoUsuarioAlteracao object to add.
     */
    protected function doAddPermissaoRelatedByCoUsuarioAlteracao($permissaoRelatedByCoUsuarioAlteracao)
    {
        $this->collPermissaosRelatedByCoUsuarioAlteracao[]= $permissaoRelatedByCoUsuarioAlteracao;
        $permissaoRelatedByCoUsuarioAlteracao->setUsuarioRelatedByCoUsuarioAlteracao($this);
    }

    /**
     * @param	PermissaoRelatedByCoUsuarioAlteracao $permissaoRelatedByCoUsuarioAlteracao The permissaoRelatedByCoUsuarioAlteracao object to remove.
     * @return Usuario The current object (for fluent API support)
     */
    public function removePermissaoRelatedByCoUsuarioAlteracao($permissaoRelatedByCoUsuarioAlteracao)
    {
        if ($this->getPermissaosRelatedByCoUsuarioAlteracao()->contains($permissaoRelatedByCoUsuarioAlteracao)) {
            $this->collPermissaosRelatedByCoUsuarioAlteracao->remove($this->collPermissaosRelatedByCoUsuarioAlteracao->search($permissaoRelatedByCoUsuarioAlteracao));
            if (null === $this->permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion) {
                $this->permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion = clone $this->collPermissaosRelatedByCoUsuarioAlteracao;
                $this->permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion->clear();
            }
            $this->permissaosRelatedByCoUsuarioAlteracaoScheduledForDeletion[]= $permissaoRelatedByCoUsuarioAlteracao;
            $permissaoRelatedByCoUsuarioAlteracao->setUsuarioRelatedByCoUsuarioAlteracao(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Usuario is new, it will return
     * an empty collection; or if this Usuario has previously
     * been saved, it will retrieve related PermissaosRelatedByCoUsuarioAlteracao from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Usuario.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Permissao[] List of Permissao objects
     */
    public function getPermissaosRelatedByCoUsuarioAlteracaoJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PermissaoQuery::create(null, $criteria);
        $query->joinWith('Perfil', $join_behavior);

        return $this->getPermissaosRelatedByCoUsuarioAlteracao($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Usuario is new, it will return
     * an empty collection; or if this Usuario has previously
     * been saved, it will retrieve related PermissaosRelatedByCoUsuarioAlteracao from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Usuario.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Permissao[] List of Permissao objects
     */
    public function getPermissaosRelatedByCoUsuarioAlteracaoJoinRecurso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PermissaoQuery::create(null, $criteria);
        $query->joinWith('Recurso', $join_behavior);

        return $this->getPermissaosRelatedByCoUsuarioAlteracao($query, $con);
    }

    /**
     * Clears out the collPermissaosRelatedByCoUsuarioCadastro collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Usuario The current object (for fluent API support)
     * @see        addPermissaosRelatedByCoUsuarioCadastro()
     */
    public function clearPermissaosRelatedByCoUsuarioCadastro()
    {
        $this->collPermissaosRelatedByCoUsuarioCadastro = null; // important to set this to null since that means it is uninitialized
        $this->collPermissaosRelatedByCoUsuarioCadastroPartial = null;

        return $this;
    }

    /**
     * reset is the collPermissaosRelatedByCoUsuarioCadastro collection loaded partially
     *
     * @return void
     */
    public function resetPartialPermissaosRelatedByCoUsuarioCadastro($v = true)
    {
        $this->collPermissaosRelatedByCoUsuarioCadastroPartial = $v;
    }

    /**
     * Initializes the collPermissaosRelatedByCoUsuarioCadastro collection.
     *
     * By default this just sets the collPermissaosRelatedByCoUsuarioCadastro collection to an empty array (like clearcollPermissaosRelatedByCoUsuarioCadastro());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPermissaosRelatedByCoUsuarioCadastro($overrideExisting = true)
    {
        if (null !== $this->collPermissaosRelatedByCoUsuarioCadastro && !$overrideExisting) {
            return;
        }
        $this->collPermissaosRelatedByCoUsuarioCadastro = new PropelObjectCollection();
        $this->collPermissaosRelatedByCoUsuarioCadastro->setModel('Permissao');
    }

    /**
     * Gets an array of Permissao objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Usuario is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Permissao[] List of Permissao objects
     * @throws PropelException
     */
    public function getPermissaosRelatedByCoUsuarioCadastro($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPermissaosRelatedByCoUsuarioCadastroPartial && !$this->isNew();
        if (null === $this->collPermissaosRelatedByCoUsuarioCadastro || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPermissaosRelatedByCoUsuarioCadastro) {
                // return empty collection
                $this->initPermissaosRelatedByCoUsuarioCadastro();
            } else {
                $collPermissaosRelatedByCoUsuarioCadastro = PermissaoQuery::create(null, $criteria)
                    ->filterByUsuarioRelatedByCoUsuarioCadastro($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPermissaosRelatedByCoUsuarioCadastroPartial && count($collPermissaosRelatedByCoUsuarioCadastro)) {
                      $this->initPermissaosRelatedByCoUsuarioCadastro(false);

                      foreach($collPermissaosRelatedByCoUsuarioCadastro as $obj) {
                        if (false == $this->collPermissaosRelatedByCoUsuarioCadastro->contains($obj)) {
                          $this->collPermissaosRelatedByCoUsuarioCadastro->append($obj);
                        }
                      }

                      $this->collPermissaosRelatedByCoUsuarioCadastroPartial = true;
                    }

                    $collPermissaosRelatedByCoUsuarioCadastro->getInternalIterator()->rewind();
                    return $collPermissaosRelatedByCoUsuarioCadastro;
                }

                if($partial && $this->collPermissaosRelatedByCoUsuarioCadastro) {
                    foreach($this->collPermissaosRelatedByCoUsuarioCadastro as $obj) {
                        if($obj->isNew()) {
                            $collPermissaosRelatedByCoUsuarioCadastro[] = $obj;
                        }
                    }
                }

                $this->collPermissaosRelatedByCoUsuarioCadastro = $collPermissaosRelatedByCoUsuarioCadastro;
                $this->collPermissaosRelatedByCoUsuarioCadastroPartial = false;
            }
        }

        return $this->collPermissaosRelatedByCoUsuarioCadastro;
    }

    /**
     * Sets a collection of PermissaoRelatedByCoUsuarioCadastro objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $permissaosRelatedByCoUsuarioCadastro A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Usuario The current object (for fluent API support)
     */
    public function setPermissaosRelatedByCoUsuarioCadastro(PropelCollection $permissaosRelatedByCoUsuarioCadastro, PropelPDO $con = null)
    {
        $permissaosRelatedByCoUsuarioCadastroToDelete = $this->getPermissaosRelatedByCoUsuarioCadastro(new Criteria(), $con)->diff($permissaosRelatedByCoUsuarioCadastro);

        $this->permissaosRelatedByCoUsuarioCadastroScheduledForDeletion = unserialize(serialize($permissaosRelatedByCoUsuarioCadastroToDelete));

        foreach ($permissaosRelatedByCoUsuarioCadastroToDelete as $permissaoRelatedByCoUsuarioCadastroRemoved) {
            $permissaoRelatedByCoUsuarioCadastroRemoved->setUsuarioRelatedByCoUsuarioCadastro(null);
        }

        $this->collPermissaosRelatedByCoUsuarioCadastro = null;
        foreach ($permissaosRelatedByCoUsuarioCadastro as $permissaoRelatedByCoUsuarioCadastro) {
            $this->addPermissaoRelatedByCoUsuarioCadastro($permissaoRelatedByCoUsuarioCadastro);
        }

        $this->collPermissaosRelatedByCoUsuarioCadastro = $permissaosRelatedByCoUsuarioCadastro;
        $this->collPermissaosRelatedByCoUsuarioCadastroPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Permissao objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Permissao objects.
     * @throws PropelException
     */
    public function countPermissaosRelatedByCoUsuarioCadastro(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPermissaosRelatedByCoUsuarioCadastroPartial && !$this->isNew();
        if (null === $this->collPermissaosRelatedByCoUsuarioCadastro || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPermissaosRelatedByCoUsuarioCadastro) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPermissaosRelatedByCoUsuarioCadastro());
            }
            $query = PermissaoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsuarioRelatedByCoUsuarioCadastro($this)
                ->count($con);
        }

        return count($this->collPermissaosRelatedByCoUsuarioCadastro);
    }

    /**
     * Method called to associate a Permissao object to this object
     * through the Permissao foreign key attribute.
     *
     * @param    Permissao $l Permissao
     * @return Usuario The current object (for fluent API support)
     */
    public function addPermissaoRelatedByCoUsuarioCadastro(Permissao $l)
    {
        if ($this->collPermissaosRelatedByCoUsuarioCadastro === null) {
            $this->initPermissaosRelatedByCoUsuarioCadastro();
            $this->collPermissaosRelatedByCoUsuarioCadastroPartial = true;
        }
        if (!in_array($l, $this->collPermissaosRelatedByCoUsuarioCadastro->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPermissaoRelatedByCoUsuarioCadastro($l);
        }

        return $this;
    }

    /**
     * @param	PermissaoRelatedByCoUsuarioCadastro $permissaoRelatedByCoUsuarioCadastro The permissaoRelatedByCoUsuarioCadastro object to add.
     */
    protected function doAddPermissaoRelatedByCoUsuarioCadastro($permissaoRelatedByCoUsuarioCadastro)
    {
        $this->collPermissaosRelatedByCoUsuarioCadastro[]= $permissaoRelatedByCoUsuarioCadastro;
        $permissaoRelatedByCoUsuarioCadastro->setUsuarioRelatedByCoUsuarioCadastro($this);
    }

    /**
     * @param	PermissaoRelatedByCoUsuarioCadastro $permissaoRelatedByCoUsuarioCadastro The permissaoRelatedByCoUsuarioCadastro object to remove.
     * @return Usuario The current object (for fluent API support)
     */
    public function removePermissaoRelatedByCoUsuarioCadastro($permissaoRelatedByCoUsuarioCadastro)
    {
        if ($this->getPermissaosRelatedByCoUsuarioCadastro()->contains($permissaoRelatedByCoUsuarioCadastro)) {
            $this->collPermissaosRelatedByCoUsuarioCadastro->remove($this->collPermissaosRelatedByCoUsuarioCadastro->search($permissaoRelatedByCoUsuarioCadastro));
            if (null === $this->permissaosRelatedByCoUsuarioCadastroScheduledForDeletion) {
                $this->permissaosRelatedByCoUsuarioCadastroScheduledForDeletion = clone $this->collPermissaosRelatedByCoUsuarioCadastro;
                $this->permissaosRelatedByCoUsuarioCadastroScheduledForDeletion->clear();
            }
            $this->permissaosRelatedByCoUsuarioCadastroScheduledForDeletion[]= $permissaoRelatedByCoUsuarioCadastro;
            $permissaoRelatedByCoUsuarioCadastro->setUsuarioRelatedByCoUsuarioCadastro(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Usuario is new, it will return
     * an empty collection; or if this Usuario has previously
     * been saved, it will retrieve related PermissaosRelatedByCoUsuarioCadastro from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Usuario.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Permissao[] List of Permissao objects
     */
    public function getPermissaosRelatedByCoUsuarioCadastroJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PermissaoQuery::create(null, $criteria);
        $query->joinWith('Perfil', $join_behavior);

        return $this->getPermissaosRelatedByCoUsuarioCadastro($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Usuario is new, it will return
     * an empty collection; or if this Usuario has previously
     * been saved, it will retrieve related PermissaosRelatedByCoUsuarioCadastro from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Usuario.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Permissao[] List of Permissao objects
     */
    public function getPermissaosRelatedByCoUsuarioCadastroJoinRecurso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PermissaoQuery::create(null, $criteria);
        $query->joinWith('Recurso', $join_behavior);

        return $this->getPermissaosRelatedByCoUsuarioCadastro($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->co_usuario = null;
        $this->nu_cpf = null;
        $this->ds_password = null;
        $this->no_usuario = null;
        $this->ds_login = null;
        $this->dt_ultimo_login = null;
        $this->ds_email = null;
        $this->co_perfil = null;
        $this->nu_celular = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collPermissaosRelatedByCoUsuarioAlteracao) {
                foreach ($this->collPermissaosRelatedByCoUsuarioAlteracao as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPermissaosRelatedByCoUsuarioCadastro) {
                foreach ($this->collPermissaosRelatedByCoUsuarioCadastro as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPerfil instanceof Persistent) {
              $this->aPerfil->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPermissaosRelatedByCoUsuarioAlteracao instanceof PropelCollection) {
            $this->collPermissaosRelatedByCoUsuarioAlteracao->clearIterator();
        }
        $this->collPermissaosRelatedByCoUsuarioAlteracao = null;
        if ($this->collPermissaosRelatedByCoUsuarioCadastro instanceof PropelCollection) {
            $this->collPermissaosRelatedByCoUsuarioCadastro->clearIterator();
        }
        $this->collPermissaosRelatedByCoUsuarioCadastro = null;
        $this->aPerfil = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UsuarioPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
