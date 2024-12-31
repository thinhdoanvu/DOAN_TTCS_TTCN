#include <iostream>
#include <graphics.h>
#include <math.h>
#include <stdlib.h>
#include <vector>

#define STB_IMAGE_WRITE_IMPLEMENTATION
#include "stb_image_write.h"

using namespace std;

// Khai báo c?u trúc Shape
struct Shape {
    int mode;           // 1: Ðu?ng th?ng, 2: Hình ch? nh?t, 3: Hình tròn
    int x_start, y_start, x_end, y_end;
    int color;
    int thickness;
};

// Bi?n toàn c?c
int x_start, y_start, x_end, y_end;
int mode = 0;        // 0: Không ch?n, 1: Ðu?ng th?ng, 2: Hình ch? nh?t, 3: Hình tròn, 4: Polyline, 5: Polygon
int current_color = WHITE; // Màu hi?n t?i
int thickness = 1;   // Ð? dày nét v? 

vector<Shape> shapes; // Luu các hình dã v? 
vector< pair<int, int> > points; // Luu tr? các di?m c?a polyline/polygon

// Luu anh PNG
void savePNG(const char* filename) {
    int width = getmaxx() + 1;
    int height = getmaxy() + 1;
    int scale = 4;
    int new_width = width * scale;
    int new_height = height * scale;
    unsigned char* buffer = new unsigned char[new_width * new_height * 3];
    
    for (int y = 0; y < new_height; y++) {
        for (int x = 0; x < new_width; x++) {
            int orig_x = x / scale;
            int orig_y = y / scale;
            int color = getpixel(orig_x, orig_y);
            int index = (y * new_width + x) * 3;
            
            unsigned char r = ((color & 0xFF0000) >> 16);
            unsigned char g = ((color & 0x00FF00) >> 8);
            unsigned char b = (color & 0x0000FF);
            buffer[index + 0] = r;
            buffer[index + 1] = g;
            buffer[index + 2] = b;
        }
    }

    bool success = stbi_write_png(filename, new_width, new_height, 3, buffer, new_width * 3);
    setcolor(WHITE);
    if (success) {
        outtextxy(10, height - 20, "Image saved as output_high_res.png");
    } else {
        outtextxy(10, height - 20, "Error saving image.");
    }
    delete[] buffer;
}

// Hien thi trang thai
void displayStatus() {
    setcolor(WHITE);
    int width = getmaxx();
    int height = getmaxy();

    char info[200];
    sprintf(info, "Start (x,y): (%d, %d) | End (x,y): (%d, %d)", x_start, y_start, x_end, y_end);
    outtextxy(width - 500, height - 90, info);

    sprintf(info, "Mode: %s", mode == 1 ? "Line" : (mode == 2 ? "Rectangle" : (mode == 3 ? "Circle" : (mode == 4 ? "Polyline" : (mode == 5 ? "Polygon" : "None")))));
    outtextxy(width - 500, height - 70, info);

    sprintf(info, "Current Color: %s", current_color == RED ? "Red" : (current_color == GREEN ? "Green" : (current_color == BLUE ? "Blue" : "White")));
    outtextxy(width - 500, height - 50, info);

    sprintf(info, "Thickness: %d", thickness);
    outtextxy(width - 500, height - 30, info);
}

// Khoi tao giao dien
void initInterface() {
    setbkcolor(BLACK);
    cleardevice();
    settextstyle(BOLD_FONT, HORIZ_DIR, 1);

    setcolor(YELLOW);
    rectangle(10, 10, 600, 500);

    setcolor(WHITE);
    rectangle(620, 10, 780, 40); outtextxy(630, 15, "Line");
    rectangle(620, 50, 780, 80); outtextxy(630, 55, "Rectangle");
    rectangle(620, 90, 780, 120); outtextxy(630, 95, "Circle");
    rectangle(620, 130, 780, 160); outtextxy(630, 135, "Clear");
    rectangle(620, 170, 780, 200); outtextxy(630, 175, "Thickness+");
    rectangle(620, 210, 780, 240); outtextxy(630, 215, "Thickness-");
    rectangle(620, 250, 780, 280); outtextxy(630, 255, "Save");
    rectangle(620, 290, 780, 320); outtextxy(630, 295, "Polyline");
    rectangle(620, 330, 780, 360); outtextxy(630, 335, "Polygon");
    rectangle(620, 370, 780, 400); outtextxy(630, 375, "Finish");

    rectangle(620, 410, 660, 440); setfillstyle(SOLID_FILL, RED); bar(621, 411, 659, 439);
    rectangle(670, 410, 710, 440); setfillstyle(SOLID_FILL, GREEN); bar(671, 411, 709, 439);
    rectangle(720, 410, 760, 440); setfillstyle(SOLID_FILL, BLUE); bar(721, 411, 759, 439);

    outtextxy(10, 510, "GVHD: Doan Vu Thinh");
    outtextxy(10, 530, "Name: Nguyen Dinh Nguyen");
    outtextxy(10, 550, "MSSV: 64131538");
    outtextxy(10, 570, "Class: 64.CNTT-3");
}

int polyline_color = WHITE;  // Màu c?a polyline
int polygon_color = WHITE;   // Màu c?a polygon
// Xu ly nhap chuot
void handleClick(int x_mouse, int y_mouse) {
    if (x_mouse > 620 && x_mouse < 780) {
        if (y_mouse > 10 && y_mouse < 40) mode = 1;
        else if (y_mouse > 50 && y_mouse < 80) mode = 2;
        else if (y_mouse > 90 && y_mouse < 120) mode = 3;
        else if (y_mouse > 130 && y_mouse < 160) { 
            cleardevice(); 
            initInterface();  
            mode = 0; 
            points.clear();
			shapes.clear(); 
        }
        else if (y_mouse > 170 && y_mouse < 200 && thickness < 10) thickness++;
        else if (y_mouse > 210 && y_mouse < 240 && thickness > 1) thickness--;
        else if (y_mouse > 250 && y_mouse < 280) savePNG("output_high_res.png");
        else if (y_mouse > 290 && y_mouse < 320) mode = 4; 
        else if (y_mouse > 330 && y_mouse < 360) mode = 5; 
        else if (y_mouse > 370 && y_mouse < 400) { 
            if (mode == 4 || mode == 5) {
                if (mode == 5 && points.size() > 2) {
                    setcolor(polygon_color); 
                    for (size_t i = 0; i < points.size() - 1; i++) {
                        line(points[i].first, points[i].second, points[i + 1].first, points[i + 1].second);
                    }
                    line(points[points.size() - 1].first, points[points.size() - 1].second, points[0].first, points[0].second);
                } else if (mode == 4 && points.size() > 1) {
                    setcolor(polyline_color); 
                    for (size_t i = 0; i < points.size() - 1; i++) {
                        line(points[i].first, points[i].second, points[i + 1].first, points[i + 1].second);
                    }
                }
                points.clear();
            }
            mode = 0;
        }
        // Xu ly mau sac
        else if (y_mouse > 410 && y_mouse < 440) {
            if (x_mouse > 620 && x_mouse < 660) {
                current_color = RED;
                if (mode == 4) polyline_color = RED;
                if (mode == 5) polygon_color = RED;
            }
            else if (x_mouse > 670 && x_mouse < 710) {
                current_color = GREEN;
                if (mode == 4) polyline_color = GREEN;
                if (mode == 5) polygon_color = GREEN;
            }
            else if (x_mouse > 720 && x_mouse < 760) {
                current_color = BLUE;
                if (mode == 4) polyline_color = BLUE;
                if (mode == 5) polygon_color = BLUE;
            }
        }
    }

    // Xu ly ve polyline hoac polygon khi nhan vào vùng ve
    if (x_mouse > 10 && x_mouse < 600 && y_mouse > 10 && y_mouse < 500) {
        if (mode == 4 || mode == 5) {
            points.push_back({x_mouse, y_mouse});
            if (mode == 5 && points.size() > 2) {
                setcolor(polygon_color); 
                for (size_t i = 0; i < points.size() - 1; i++) {
                    line(points[i].first, points[i].second, points[i + 1].first, points[i + 1].second);
                }
                line(points[points.size() - 1].first, points[points.size() - 1].second, points[0].first, points[0].second);
            } else if (mode == 4 && points.size() > 1) {
                setcolor(polyline_color);
                for (size_t i = 0; i < points.size() - 1; i++) {
                    line(points[i].first, points[i].second, points[i + 1].first, points[i + 1].second);
                }
            }
        }
    }
}

// Ve hình
void drawShape(int x_start, int y_start, int x_end, int y_end) {
    setcolor(current_color);
    setlinestyle(SOLID_LINE, 0, thickness);

    switch (mode) {
        case 1: line(x_start, y_start, x_end, y_end); break;
        case 2: rectangle(x_start, y_start, x_end, y_end); break;
        case 3: {
            int r = sqrt(pow(x_end - x_start, 2) + pow(y_end - y_start, 2));
            circle(x_start, y_start, r); break;
        }
        default: break;
    }
}

int main() {
    initwindow(800, 600);
    initInterface();

    bool drawing = false;

    while (true) {
        if (ismouseclick(WM_LBUTTONDOWN)) {
            int x_mouse, y_mouse;
            getmouseclick(WM_LBUTTONDOWN, x_mouse, y_mouse);

            if (x_mouse > 10 && x_mouse < 600 && y_mouse > 10 && y_mouse < 500) {
                if (!drawing) { x_start = x_mouse; y_start = y_mouse; drawing = true; }
                else { x_end = x_mouse; y_end = y_mouse; drawShape(x_start, y_start, x_end, y_end); drawing = false; }
            }

            handleClick(x_mouse, y_mouse);
        }

        displayStatus();
        delay(10);
    }

    closegraph();
    return 0;
}

