#include <stdio.h>
#include <graphics.h>
#include <conio.h>
#include <stdlib.h>
#include <string.h>

#define INSIDE 0  // 0000
#define LEFT 1    // 0001
#define RIGHT 2   // 0010
#define BOTTOM 4  // 0100
#define TOP 8     // 1000

// Kich thuoc khung xen 
int xmin, ymin, xmax, ymax;

void keyboard();
void DocFile();
void New(); 

void GiaoDienChinh(){
    setcolor(WHITE);
    // boder
    setlinestyle(0, 1, 3);
    rectangle(30, 10, 550, 400);
    // nut tao moi 
    setcolor(GREEN);
    settextstyle(2, 0, 7);
    rectangle(580, 10, 680, 50);
    outtextxy(610, 20, "New");
    // nut loadfile 
    setcolor(WHITE);
    settextstyle(2, 0, 7);
    rectangle(580, 70, 680, 110);
    outtextxy(590, 80, "Load File");
    // nut Keyboard 
    setcolor(WHITE);
    settextstyle(2, 0, 7);
    rectangle(580, 130, 680, 170);
    outtextxy(590, 140, "Keyboard");
    // Mouse 
    setcolor(RED);
    settextstyle(2, 0, 7);
    rectangle(580, 190, 710, 290);
    outtextxy(615, 200, "Mouse");
    //nut ve duong thang 
	setcolor(WHITE);
    settextstyle(2, 0, 7);
    rectangle(590, 230, 640, 280);
    setcolor(YELLOW);
    line(600, 270, 630, 240); 
    //nut ve hinh 
    setcolor(WHITE);
    settextstyle(2, 0, 7);
    rectangle(650, 230, 700, 280);
    setcolor(YELLOW);              
    rectangle(665, 245, 685, 265);
    // Thông tin
    setcolor(WHITE);
    outtextxy(580, 300, "GVHD: Doan Vu Thinh");
    outtextxy(580, 340, "Ten sinh vien: Nguyen Khanh Nhu");
    outtextxy(580, 380, "MSSV: 64131703");
    outtextxy(580, 420, "Lop: 64.CNTT-3");
}


// tinh ma vung cua diem 
int computeCode(int x, int y) {
    int code = INSIDE;
    if (x < xmin)
        code |= LEFT;
    else if (x > xmax)
        code |= RIGHT;
    if (y < ymin)
        code |= BOTTOM;
    else if (y > ymax)
        code |= TOP;
    return code;
}

// Cohen-Sutherland, tim toa do giao diem 
bool cohenSutherlandClip(int *x1, int *y1, int *x2, int *y2) {
    int code1 = computeCode(*x1, *y1);
    int code2 = computeCode(*x2, *y2);
    bool accept = false;

    while (true) {
        if ((code1 == 0) && (code2 == 0)) {
            // 2 diem deu nam trong hinh chu nhat 
            accept = true;
            break;
        } else if (code1 & code2) {
            // 2 diem nam ngoai cung 1 phia 
            break;
        } else {
            int codeOut;
            int x, y;

            // Chon ma vung ngoai 
            codeOut = code1 ? code1 : code2;

            // Tinh giao diem 
            if (codeOut & TOP) {
                x = *x1 + (*x2 - *x1) * (ymax - *y1) / (*y2 - *y1);
                y = ymax;
            } else if (codeOut & BOTTOM) {
                x = *x1 + (*x2 - *x1) * (ymin - *y1) / (*y2 - *y1);
                y = ymin;
            } else if (codeOut & RIGHT) {
                y = *y1 + (*y2 - *y1) * (xmax - *x1) / (*x2 - *x1);
                x = xmax;
            } else if (codeOut & LEFT) {
                y = *y1 + (*y2 - *y1) * (xmin - *x1) / (*x2 - *x1);
                x = xmin;
            }

            //Cap nhat diem ngoai voi giao diem 
            if (codeOut == code1) {
                *x1 = x;
                *y1 = y;
                code1 = computeCode(*x1, *y1);
            } else {
                *x2 = x;
                *y2 = y;
                code2 = computeCode(*x2, *y2);
            }
        }
    }

    return accept;
}

void clickmouse() {
    int x_mouse;
    int y_mouse;
    while (1) {
        if (ismouseclick(WM_LBUTTONDOWN)) {
            getmouseclick(WM_LBUTTONDOWN, x_mouse, y_mouse);
            
            // Kiem tra nut New
            if (x_mouse > 580 && x_mouse < 680 && y_mouse > 10 && y_mouse < 50) {
                printf("Resetting....\n");
                New();
            }
            // Kiem tra nut Load File
            else if (x_mouse > 580 && x_mouse < 680 && y_mouse > 70 && y_mouse < 110) {
                printf("Doc file...\n");
                DocFile();
            }
            // Kiem tra nut Keyboard
            else if (x_mouse > 580 && x_mouse < 680 && y_mouse > 130 && y_mouse < 170) {
                setcolor(RED);
                keyboard();
            }
            // Kiem tra nut ve duong thang 
            else if (x_mouse > 590 && x_mouse < 640 && y_mouse > 230 && y_mouse < 280) {
                printf("Ve duong thang...\n");
                int x1, y1, x2, y2;

                // Nhan chuot lan 1 lay diem dau 
                while (!ismouseclick(WM_LBUTTONDOWN)) delay(100);
                getmouseclick(WM_LBUTTONDOWN, x1, y1);

                // Nhan chuot lan 2 lay diem cuoi 
                while (!ismouseclick(WM_LBUTTONDOWN)) delay(100);
                getmouseclick(WM_LBUTTONDOWN, x2, y2);

                printf("Toa do duong thang: P1(%d, %d) P2(%d, %d)\n", x1, y1, x2, y2);

                // Kien tra vi tri duong thang so voi hinh chu nhat 
                int code1 = computeCode(x1, y1);
                int code2 = computeCode(x2, y2);

                setcolor(WHITE);
                line(x1, y1, x2, y2);

                if ((code1 == 0) && (code2 == 0)) {
                    // Truong hop nam trong hinh chu nhat 
                    setcolor(RED);
                    line(x1, y1, x2, y2);
                    printf("Duong thang nam trong hinh chu nhat.\n");
                } else if (code1 & code2) {
                    // Truong hop nam ngoai cung phia 
                    printf("Duong thang nam ngoai hinh chu nhat.\n");
                } else {
                    // Truong hop cat hinh chu nhat 
                    int cx1 = x1, cy1 = y1, cx2 = x2, cy2 = y2;
                    if (cohenSutherlandClip(&cx1, &cy1, &cx2, &cy2)) {
                        setcolor(RED);
                        // Ve phan giao cat voi hinh chu nhat 
                        line(cx1, cy1, cx2, cy2);
                        printf("Toa do duong thang cat hinh chu nhat: N1(%d, %d), N2(%d, %d)\n", cx1, cy1, cx2, cy2);
                    }
                }
            }
            // Kiem tra nut ve hinh 
            else if (x_mouse > 650 && x_mouse < 700 && y_mouse > 230 && y_mouse < 280) {
                printf("Ve hinh...\n");
                int x1, y1, x2, y2;

                // Nhan chuot lay goc dau 
                while (!ismouseclick(WM_LBUTTONDOWN)) delay(100);
                getmouseclick(WM_LBUTTONDOWN, x1, y1);

                // Nhan chuot lay goc doi dien 
                while (!ismouseclick(WM_LBUTTONDOWN)) delay(100);
                getmouseclick(WM_LBUTTONDOWN, x2, y2);

                setcolor(GREEN);
                rectangle(x1, y1, x2, y2);

                // Luu lai toa do 
                xmin = (x1 < x2) ? x1 : x2;
                ymin = (y1 < y2) ? y1 : y2;
                xmax = (x1 > x2) ? x1 : x2;
                ymax = (y1 > y2) ? y1 : y2;

                printf("Toa do hinh: xmin=%d, ymin=%d, xmax=%d, ymax=%d\n", xmin, ymin, xmax, ymax);
            }
        }
        delay(100);
    }
}

void New(){
    cleardevice();
    GiaoDienChinh();
}

void DocFile() {
    FILE *file = fopen("ttcs12.txt", "r");
    if (!file) {
        printf("err\n");
        return;
    }

    // Doc toa do xmin, ymin, xmax, ymax
    fscanf(file, "%d %d %d %d", &xmin, &ymin, &xmax, &ymax);
    setcolor(GREEN);
    rectangle(xmin, ymin, xmax, ymax);

    // Doc toa do cac diem
    int x1, y1, x2, y2;
    fscanf(file, "%d %d", &x1, &y1);
    fscanf(file, "%d %d", &x2, &y2);

    // Ve doan thang ban dau
    setcolor(RED);
    line(x1, y1, x2, y2);
    outtextxy(x1, y1, "P1");
    outtextxy(x2, y2, "P2");

    // Thuc hien thuat toan Cohen-Sutherland
    printf("Dang thuc hien thuat toan Cohen-Sutherland...\n");
    if (cohenSutherlandClip(&x1, &y1, &x2, &y2)) {
        setcolor(BLUE);
        line(x1, y1, x2, y2);
        printf("Toa do giao diem: N1(%d, %d)  N2(%d, %d)\n", x1, y1, x2, y2);
    } else {
        printf("Doan thang nam ngoai hinh chu nhat\n");
    }

    fclose(file);
}

void keyboard() {
    int x_mouse, y_mouse;
    int x1, y1, x2, y2; // Toa do 2 diem
    while (1) {
        if (ismouseclick(WM_LBUTTONDOWN)) {
            getmouseclick(WM_LBUTTONDOWN, x_mouse, y_mouse);

                // Nhap du lieu tu ban phim
                printf("NHAP PHAI THOA MAN DIEU KIEN \n 80<X<550 && 10<Y<370 \n");
                printf("Nhap toa do hinh chu nhat 'xmin ymin xmax ymax': "); 
                scanf("%d %d %d %d", &xmin, &ymin, &xmax, &ymax);
                setcolor(GREEN);
                rectangle(xmin, ymin, xmax, ymax);

                printf("Nhap toa do diem 1 (x1 y1): ");
                scanf("%d %d", &x1, &y1);

                printf("Nhap toa do diem 2 (x2 y2): ");
                scanf("%d %d", &x2, &y2);

                // Ve duong thang da nhap
                setcolor(RED);
                line(x1, y1, x2, y2);
                outtextxy(x1, y1, "P1");
                outtextxy(x2, y2, "P2");

                // Thuc hien thuat toan Cohen-Sutherland
                printf("Dang thuc hien thuat toan Cohen-Sutherland...\n");
                int code1 = computeCode(x1, y1);
                int code2 = computeCode(x2, y2);

                if ((code1 == 0) && (code2 == 0)) {
                    // Duong thang nam trong hinh chu nhat
                    printf("Duong thang nam trong hinh chu nhat.\n");
                    setcolor(RED);
                    line(x1, y1, x2, y2);
                } else if (code1 & code2) {
                    // Duong thang nam ngoai cung 1 phia
                    printf("Duong thang nam ngoai hinh chu nhat.\n");
                    setcolor(WHITE);
                    line(x1, y1, x2, y2);
                } else {
                    // Duong thang cat hinh chu nhat
                    int cx1 = x1, cy1 = y1, cx2 = x2, cy2 = y2;
                    if (cohenSutherlandClip(&cx1, &cy1, &cx2, &cy2)) {
                        printf("Duong thang cat hinh chu nhat.\n");
                        printf("Toa do giao diem: N1(%d, %d), N2(%d, %d)\n", cx1, cy1, cx2, cy2);
                        setcolor(BLUE);
                        line(cx1, cy1, cx2, cy2);
                    }
                }
                break;
            
        }
        delay(100); 
    }
}


int main(){
    initwindow(900, 500);
    GiaoDienChinh();
    clickmouse();
    getch();
    closegraph(); 
    return 0;
}

