#include<iostream>
// -- Thu vien nguoi dung tu dinh nghia
#include"MeanFi.h"
#include<graphics.h>
//-- Ngon ngu C++
using namespace std;
int continuee = 1;
//----------------------------------------------------

//--------------------------------------------------------

int main()
{
	initwindow(900,1900);
	//----------------------------------------------------------
	SinhCay();
	//--- Phan menu ----------------------------------------------
	menu1();
	//----------------------------------------------------------
	DuyetCay();
	while(continuee == 1)
	{
		cout << "\n\n\n\nTiep tuc hay dung lai? (tiep tuc [1], dung lai [0]): ";
		cin >> continuee;
		if(continuee == 1)
		{
			DuyetCay();
		}
		else
		{
			cout << "\nChuong trinh ket thuc!!! (da xoa du lieu)";
			exit(0);
		}
	}
	getch();
	closegraph();
	return 0;
}
