<?php
class Graph{

	private $len = 0;
	private $graph = array();
	private $visited = array();

	public function __construct(){

		$this->graph = array(
			array(0, 1, 1, 0, 0, 0),
			array(1, 0, 0, 1, 0, 0),
			array(1, 0, 0, 1, 1, 1),
			array(0, 1, 1, 0, 1, 0),
			array(0, 0, 1, 1, 0, 1),
			array(0, 0, 1, 0, 1, 0)
		);

		$this->len = count($this->graph);
		$this->init();
	}

	function init(){
		for ($i = 0; $i < $this->len; $i++) {
			$this->visited[$i] = 0;
		}
	}

	function depthFirst($vertex){
		$this->visited[$vertex] = 1;
		for ($i = 0; $i < $this->len; $i++) {
			if ($this->graph[$vertex][$i] == 1 && !$this->visited[$i]) {
				$this->depthFirst($i);
			}
		}
		echo "$vertex&nbsp;&nbsp;&nbsp;";
	}
	
	function breadthFirst($start){
		//$visited = array();
		$queue = array();
		echo "BFS:&nbsp;&nbsp;&nbsp;$start"; 
		
		//init($visited, $graph);
		array_push($queue, $start);
		$this->visited[$start] = 1;
	
		while (count($queue)) {
			$t = array_shift($queue);
			foreach ($this->graph[$t] as $key => $vertex) {
				if (!$this->visited[$key] && $vertex == 1) {
					$this->visited[$key] = 1;
					echo "&nbsp;&nbsp;&nbsp;$key";
					array_push($queue, $key);
				}
			}
		}
		
	}
	
}

echo "DFS:&nbsp;&nbsp;";
$g1 = new Graph();
$g1->depthFirst(2);

echo "<br/>";
$g2 = new Graph();
$g2->breadthFirst(2);

?>