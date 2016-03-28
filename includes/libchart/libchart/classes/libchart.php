<?php
    /* Libchart - PHP chart library
     * Copyright (C) 2005-2011 Jean-Marc Trémeaux (jm.tremeaux at gmail.com)
     * 
     * This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     * 
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with this program.  If not, see <http://www.gnu.org/licenses/>.
     * 
     */

    require 'model/ChartConfig.php';
    require 'model/Point.php';
    require 'model/DataSet.php';
    require 'model/XYDataSet.php';
    require 'model/XYSeriesDataSet.php';
    
    require 'view/primitive/Padding.php';
    require 'view/primitive/Rectangle.php';
    require 'view/primitive/Primitive.php';
    require 'view/text/Text.php';
    require 'view/color/Color.php';
    require 'view/color/ColorSet.php';
    require 'view/color/Palette.php';
    require 'view/axis/Bound.php';
    require 'view/axis/Axis.php';
    require 'view/plot/Plot.php';
    require 'view/caption/Caption.php';
    require 'view/chart/Chart.php';
    require 'view/chart/BarChart.php';
    require 'view/chart/VerticalBarChart.php';
    require 'view/chart/HorizontalBarChart.php';
    require 'view/chart/LineChart.php';
    require 'view/chart/PieChart.php';
?>
