<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SaleDetails Model
 *
 * @property \App\Model\Table\ArticlesTable|\Cake\ORM\Association\BelongsTo $Articles
 * @property \App\Model\Table\SalesTable|\Cake\ORM\Association\BelongsTo $Sales
 *
 * @method \App\Model\Entity\SaleDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\SaleDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SaleDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SaleDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SaleDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SaleDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class SaleDetailsTable extends Table
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

        $this->setTable('sale_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sales', [
            'foreignKey' => 'sale_id',
            'joinType' => 'INNER'
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
            //->numeric('quantity')
            ->requirePresence('quantity', 'create')
            //->allowEmptyString('quantity', false);

            ->notEmpty('quantity', 'A quantity is required');

        $validator
            //->numeric('cost')
            //->allowEmptyString('cost');

            ->requirePresence('cost', 'create')
            ->notEmpty('cost', 'A cost is required');

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
        $rules->add($rules->existsIn(['article_id'], 'Articles'));
        $rules->add($rules->existsIn(['sale_id'], 'Sales'));

        return $rules;
    }
}
