<?php
	class Node
	{
		private $id;
		private $estimated;
		private $neighbors = array();
		
		/* construct
		* input: integer id name
		* input: double for estimated cost 
		*input: assocciative array for neighbor id as index and estimated cost as value */
		public function __construct($id, $estimated, $neighbors)
		{
			$this->id = $id;
			$this->estimated = $estimated;
			$this->neighbors = $neighbors;
		}
		
		// mutator so that the graph can randomly assign which node is the goal
		public function makeGoal()
		{
			$this->estimated = 0;
		}
		
		//accessor function
		public function getID()
		{
			return($this->id);
		}
		
		public function getEstimated()
		{
			return($this->estimated);
		}
		
		public function getNeighbors()
		{
			return($this->neighbors);
		}						
	}
?>