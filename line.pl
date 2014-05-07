use GD::Graph::lines;

@data = ( 
    [ qw( Jan Feb Mar Apr May Jun Jul Aug Sep ) ],
    [ reverse(4, 3, 5, 6, 3,  1.5, -1, -3, -4)]
);

$my_graph = new GD::Graph::lines();
$my_graph->set( 
        x_label => 'Month',
        y_label => 'Measure of success',
        title => 'A Simple Line Graph',
        y_max_value => 8,
        y_min_value => -6,
        y_tick_number => 14,
        y_label_skip => 2,
        box_axis => 0,
        line_width => 3,
        zero_axis_only => 1,
        x_label_position => 1,
        y_label_position => 1,
);
my $gd = $my_graph->plot(\@data);
print $gd->png();
