// $( function() {

	var topics = [],
		projects = [],
		$topicLinks = $( '[data-topic-link' ),
		$projects = $( '#projects article' ),
		DateTime = luxon.DateTime,
		timelineStart = Infinity,
		timelineEnd = -Infinity

	$topicLinks.each( function() {
		topics.push( $( this ).attr( 'data-topic-link' ) )
	})

	$projects.each( function() {
		var $this = $( this ),
			thisStart = DateTime.fromISO( $this.data( 'project-start-date' ) ),
			thisEnd = DateTime.fromISO( $this.data( 'project-end-date' ) )

			timelineStart = Math.min( timelineStart, thisStart)
			timelineEnd = Math.max( timelineEnd, thisEnd)

		projects.push( {
			'start': thisStart,
			'end': thisEnd,
			'topics': $( this ).data( 'project-topics' ).split( ',' ),
			'$el': $this
		} )
	})

	// Now create the timelineRanges based on the relative position of the 
	//  projects[n].start/end properties relative to the timelineStart/End
	for( var i = 0; i < projects.length; i++ ) {
		var $timelineRange = $( '<div class="timelineRange" />' )
		$timelineRange.css( {
			'top': timeToPercent( projects[i].start.ts ) + '%',
			'bottom': timeToPercent( projects[i].end.ts ) + '%'
		} )
		$timelineRange.appendTo( '#timelines' )
	}

	function timeToPercent( value, r1, r2 ) { 
		console.log(value)
		var r1 = r1 || [timelineStart, timelineEnd],
		r2 = r2 || [0, 100]
		return ( value - r1[ 0 ] ) * ( r2[ 1 ] - r2[ 0 ] ) / ( r1[ 1 ] - r1[ 0 ] ) + r2[ 0 ]
	}

	console.log( topics, projects, timelineStart, timelineEnd )

// } )
