from matplotlib.figure import Figure                         
from matplotlib.backends.backend_agg import FigureCanvasAgg  

fig = Figure(figsize=[4,4])                                  
ax = fig.add_axes([.1,.1,.8,.8])                             
ax.scatter([1,2], [3,4])                                     
canvas = FigureCanvasAgg(fig)                                
canvas.print_figure("test.png")
