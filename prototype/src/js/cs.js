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
            timelineEnd = Math.max( timelineEnd, thisStart)

        projects.push( {
            'start': thisStart,
            'end': thisEnd,
            'topics': $( this ).data( 'project-topics' ).split( ',' )
        } )
    })

    // Now create the timelineRanges based on the relative position of the 
    //  projects[n].start/end properties relative to the timelineStart/End

    console.log( topics, projects, timelineStart, timelineEnd )

// } )
