#!/usr/bin/perl -wT

#use strict;
use CGI;
use GD::Graph::lines;

my $q = new CGI;
my $graph = new GD::Graph::lines( 600, 300 );

my @data =  read_data();

$graph->set( 
    title             => "Sample line graph: concurrent users",
    x_label           => "time",
    y_label           => "users",
    long_ticks        => 1,
    y_min_value       => 0,
    x_label_skip      => 4,
    x_label_position  => 0.5,
    x_labels_vertical => 1,
    x_tick_offset     => 3,
    bar_spacing       => 2,
    line_width        => 1,
);

#    y_max_value     => 1000,
#    y_tick_number   => 20,

my $gd_image = $graph->plot( \@data );

print $q->header( -type => "image/png", -expires => "-1d" );

binmode STDOUT;
print $gd_image->png;

sub read_data
{
  my @d;
  open(DATA,"){
    chomp;
    my @row = split/;/;

    for (my $i = 0; $i <= $#row; $i++) {
      undef $row[$i] if ($row[$i] eq 'undef');
      push @{$d[$i]}, $row[$i];
    }
  }
  close (DATA);
  return @d;
}
