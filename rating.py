import pylab

def drawGraph(xData,yData) :
	pylab.figure(1)
	pylab.plot(xData,yData)
	pylab.show()

pylab.title('Conors Rating', fontsize =25)
pylab.xlabel('Year')
pylab.ylabel('Rating')

years = [1984,1985,1986,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014]
rating = [1212,1396,1454,1727,1727,1785,1764,1751,1737,1675,1688,1702,1657,1666,1662,1667,1672]

drawGraph(years, rating)
