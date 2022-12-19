<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ventas Model
 *
 * @property \App\Model\Table\EjemplarsTable&\Cake\ORM\Association\BelongsTo $Ejemplars
 *
 * @method \App\Model\Entity\Venta newEmptyEntity()
 * @method \App\Model\Entity\Venta newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Venta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Venta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Venta findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Venta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Venta[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Venta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venta[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Venta[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Venta[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Venta[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VentasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('ventas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ejemplars', [
            'foreignKey' => 'ejemplar_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('ejemplar_id')
            ->notEmptyString('ejemplar_id');

        $validator
            ->integer('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmptyString('cantidad');

        $validator
            ->scalar('observaciones')
            ->allowEmptyString('observaciones');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('ejemplar_id', 'Ejemplars'), ['errorField' => 'ejemplar_id']);

        return $rules;
    }
}
