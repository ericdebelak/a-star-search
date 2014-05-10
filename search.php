<?php
	// a star search!
	/* input: (array) graph, which is simply an array of nodes
	 * input: (integer) starting point for the graph, node number
	 * input: (array) by reference, an array of the path we are following to the goal
	 * output: (array) of the path we followed */
	function aStar($graph, $start, &$pathStack)
	{
		// create an array of visited nodes
		$visited = array();
		
		// keep track of the path we take to get to the goal
		$pathStack[] = $start;
		
		// start at the starting node
		$parentNode = $graph[$start];
		
		// if it has an estimated cost of 0, we found our goal, and we return the path we took to get there
		if($parentNode->getEstimated() == 0)
		{
			return $pathStack;
		}
		
		// get the neighbors of our parent node
		$neighbors = $parentNode->getNeighbors();
		
		// sort them by cost so we start with the cheapest path
		asort($neighbors);
		
		// if there are no neighbors, or no more neighbors, then...
		if(empty($neighbors))
		{
			// push the current node to the visited array so we don't visit it again
			$visited[] = $start;
			// take it out of the pathStack
			array_pop($pathStack);
			// go back to the last item on the pathStack to visit the next neighbors
			$start = end($pathStack);
			// set that last item as the new starting point
			$parentNode = $graph[$start];
			// get the neighbors
			$neighbors = $parentNode->getNeighbors();
			// sort them again based on cost
			asort($neighbors);
		}
		
		foreach($neighbors as $child => $cost)
		{
			
			// if the child node is in the visited array, skip it
			if(in_array($child, $visited))
			{
				continue;
			}
			// set the cheapest child (cheapest path) as the new starting point
			$start = $child;
			// push it to the visited array
			$visited[] = $start;
			// recursively call the function with the new starting point
			return aStar($graph, $start, $pathStack);
		}
	}
?>