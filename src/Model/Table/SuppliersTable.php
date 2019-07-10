<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suppliers Model
 *
 * @property \App\Model\Table\PurchasesTable|\Cake\ORM\Association\HasMany $Purchases
 *
 * @method \App\Model\Entity\Supplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Supplier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Supplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Supplier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SuppliersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('suppliers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Purchases', [
            'foreignKey' => 'supplier_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            //->scalar('ruc')
            ->maxLength('ruc', 255)
            ->requirePresence('ruc', 'create')
            //->allowEmptyString('ruc', false);

            ->notEmpty('ruc', 'A ruc is required');

        $validator
            //->scalar('social_reason')
            ->maxLength('social_reason', 2000)
            //->allowEmptyString('social_reason');

            ->requirePresence('social_reason', 'create')
            ->notEmpty('social_reason', 'A social reason is required');

        $validator
            //->scalar('contact_name')
            ->maxLength('contact_name', 255)
            ->requirePresence('contact_name', 'create')
            //->allowEmptyString('contact_name', false);

            ->notEmpty('contact_name', 'A contact name is required');

        $validator
            //->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            //->allowEmptyString('phone', false);

            ->notEmpty('phone', 'A phone is required');

        $validator
            //->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            //->allowEmptyString('address', false);

            ->notEmpty('address', 'An address is required');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false)

            ->notEmpty('email', 'An email is required');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
