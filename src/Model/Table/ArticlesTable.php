<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \App\Model\Table\BrandsTable|\Cake\ORM\Association\BelongsTo $Brands
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\PurchaseDetailsTable|\Cake\ORM\Association\HasMany $PurchaseDetails
 * @property \App\Model\Table\SaleDetailsTable|\Cake\ORM\Association\HasMany $SaleDetails
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesTable extends Table
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

        $this->setTable('articles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Brands', [
            'foreignKey' => 'brand_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PurchaseDetails', [
            'foreignKey' => 'article_id'
        ]);
        $this->hasMany('SaleDetails', [
            'foreignKey' => 'article_id'
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
            //->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            //->allowEmptyString('name', false);

            ->notEmpty('name', 'A name is required');

        $validator
            //->scalar('code')
            ->maxLength('code', 255)
            ->requirePresence('code', 'create')
            //->allowEmptyString('code', false);

            ->notEmpty('code', 'A code is required');

        $validator
            //->scalar('description')
            ->maxLength('description', 1500)
            //->allowEmptyString('description');

            ->notEmpty('description', 'A description is required');

        $validator
            //->numeric('price')
            ->requirePresence('price', 'create')
            //->allowEmptyString('price', false);

            ->notEmpty('price', 'A price is required')
            ->add('price', 'validValue', [
                'rule' => ['range', 0, 100000]
            ]);

        $validator
            //->numeric('stack')
            ->requirePresence('stack', 'create')
            //->allowEmptyString('stack', false);

            ->notEmpty('stack', 'A stock is required')
            ->add('stack', 'validValue', [
                'rule' => ['range', 0, 100000]
            ]);

        $validator
            ->numeric('quantity')

            ->allowEmptyString('quantity', true);


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
        $rules->add($rules->existsIn(['brand_id'], 'Brands'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
