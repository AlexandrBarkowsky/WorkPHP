<?php
Class Lifo{
    protected $stack;//Стэк
    protected $limit;//Лимит записей
    /*
     * Конструктор
     * @param int: $limit
     */
    public function __construct($limit) {
        // инициализация стека
        $this->stack = array();
        // устанавливаем ограничение на количество элементов в стеке
        $this->limit = $limit;
    }
    /*
     * Добавляет в стек массив
     * @param array(int): $newarr
     */
    public function addStack($newarr){
        foreach ($newarr as $info){
              $this->push($info['user_id']);
              $this->push($info['url']);
              $this->push($info['file_id']);
        }
    }
    /*
     * Добавляет в вершину стека
     * @param mixed: $item
     */
    public function push($item) {
        // проверяем, не полон ли наш стек
        if (count($this->stack) < $this->limit) {
            // добавляем новый элемент в начало массива
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Стек переполнен!'); 
        }
    }
    /*
     * Возвращает низ стека
     * returned mixed
     */
    public function pop() {
        if ($this->isEmpty()) {
            // проверка на пустоту стека
	      throw new RunTimeException('Стек пуст!');
	  } else {
            // Извлекаем первый элемент массива
            return array_shift($this->stack);
        }
    }
    /*
     * Проверяет пустой ли стек
     */
    public function isEmpty() {
        return empty($this->stack);
    }
}
?>